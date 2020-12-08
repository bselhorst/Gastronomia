<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursos;
use Illuminate\Support\Facades\DB;
use PDF;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('cursos')->select('cursos.id', 'cursos.nome' ,'cursos.habilitacao', 'cursos.eixo_tecnologico', 'cursos.forma_ofertada', 'cursos.qualificacao_tecnica', DB::raw('COALESCE(sum(curso_modulo_disciplinas.carga_horaria), 0) as carga_horaria' ))
        ->leftJoin('curso_modulos', 'curso_modulos.curso_id', 'cursos.id')
        ->leftJoin('curso_modulo_disciplinas', 'curso_modulo_disciplinas.modulo_id', 'curso_modulos.id')
        ->groupBy('cursos.id', 'cursos.nome','cursos.habilitacao', 'cursos.eixo_tecnologico', 'cursos.forma_ofertada', 'cursos.qualificacao_tecnica')
        ->paginate(15);
        // $data = Cursos::paginate(15);
        return view('cursosIndex', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursosForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'habilitacao' => '',
            'eixo_tecnologico' => '',
            'forma_ofertada' => '',
            'qualificacao_tecnica' => '',
        ]);
        Cursos::create($validatedData);
        return redirect('/cursos')->with('success', 'Registro adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Cursos::findOrFail($id);
        return view('cursosForm', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'habilitacao' => '',
            'eixo_tecnologico' => '',
            'forma_ofertada' => '',
            'qualificacao_tecnica' => '',
        ]);
        Cursos::findOrFail($id)->update($validatedData);
        return redirect('/cursos')->with('success', 'Registro editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cursos::findOrFail($id)->delete();
        return redirect('/cursos')->with('success', 'Registro deletado com sucesso!');
    }

    public function generatePDF($id){
        $disciplinas = DB::table('cursos')->select('cursos.id as curso_id', 'curso_modulos.id as modulo_id', 'curso_modulo_disciplinas.nome', 'curso_modulo_disciplinas.carga_horaria')
        ->leftJoin('curso_modulos', 'curso_modulos.curso_id', 'cursos.id')
        ->leftJoin('curso_modulo_disciplinas', 'curso_modulo_disciplinas.modulo_id', 'curso_modulos.id')
        ->get();
        $curso = DB::table('cursos')->select('cursos.id', 'cursos.nome' ,'cursos.habilitacao', 'cursos.eixo_tecnologico', 'cursos.forma_ofertada', 'cursos.qualificacao_tecnica', DB::raw('COALESCE(sum(curso_modulo_disciplinas.carga_horaria), 0) as carga_horaria' ))
        ->leftJoin('curso_modulos', 'curso_modulos.curso_id', 'cursos.id')
        ->leftJoin('curso_modulo_disciplinas', 'curso_modulo_disciplinas.modulo_id', 'curso_modulos.id')
        ->groupBy('cursos.id', 'cursos.nome','cursos.habilitacao', 'cursos.eixo_tecnologico', 'cursos.forma_ofertada', 'cursos.qualificacao_tecnica')
        ->get();
        $modulos = DB::table('curso_modulos')->select('curso_modulos.id', 'curso_modulos.nome', DB::raw('COALESCE(sum(curso_modulo_disciplinas.carga_horaria), 0) as carga_horaria' ))
        ->leftJoin('curso_modulo_disciplinas', 'curso_modulo_disciplinas.modulo_id', 'curso_modulos.id')
        ->groupBy('curso_modulos.id', 'curso_modulos.nome')
        ->get();
        $pdf = PDF::loadView('cursosItinerarioPDF', compact('curso', 'modulos', 'disciplinas'));
        return $pdf->download('itinerario.pdf');
    }
}
