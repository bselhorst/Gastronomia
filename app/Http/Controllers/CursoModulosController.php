<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CursoModulos;
use Illuminate\Support\Facades\DB;

class CursoModulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($curso_id)
    {
        //DB::table('curso_modulo_disciplinas')->where('modulo_id', $modulo_id)->sum();
        $data = DB::table('curso_modulos')->select('curso_modulos.id', 'curso_modulos.nome', DB::raw('COALESCE(sum(curso_modulo_disciplinas.carga_horaria), 0) as carga_horaria' ))
        ->leftJoin('curso_modulo_disciplinas', 'curso_modulo_disciplinas.modulo_id', 'curso_modulos.id')
        ->groupBy('curso_modulos.id', 'curso_modulos.nome')
        ->paginate(15);

        // $data = CursoModulos::where('curso_id', $curso_id)->paginate(15);
        return view('cursoModulosIndex', compact('data', 'curso_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($curso_id)
    {

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
            'curso_id' => 'required',
            'nome' => 'required',
        ]);
        CursoModulos::create($validatedData);
        $curso_id = $validatedData['curso_id'];
        $data = CursoModulos::where('curso_id', $curso_id)->paginate(15);
        return view('cursoModulosIndex', compact('data', 'curso_id'));
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
    public function edit($curso_id, $id)
    {
        $data = CursoModulos::where('curso_id', $curso_id)->paginate(15);
        $item = CursoModulos::findOrFail($id);
        return view('cursoModulosIndex', compact('data', 'curso_id', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $curso_id, $id)
    {
        $validatedData = $request->validate([
            'curso_id' => 'required',
            'nome' => 'required',
        ]);
        CursoModulos::findOrFail($id)->update($validatedData);
        return redirect('/'.$curso_id.'/modulos')->with('success', 'Registro deletado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($curso_id, $id)
    {
        CursoModulos::findOrFail($id)->delete();
        return redirect('/'.$curso_id.'/modulos')->with('success', 'Registro deletado com sucesso!');
    }
}
