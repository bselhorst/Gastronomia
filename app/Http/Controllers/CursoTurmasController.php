<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CursoTurmas;
use App\Models\Cursos;
use Illuminate\Support\Facades\DB;

class CursoTurmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = CursoTurmas::orderBy('nome')->paginate(15);
        $data = DB::table('curso_turmas')->select('curso_turmas.id', 'curso_turmas.nome', 'curso_turmas.curso_id','curso_turmas.ano', 'cursos.nome as curso')
        ->leftJoin('cursos', 'curso_turmas.curso_id', 'cursos.id')
        ->paginate(15);
        return view('cursoTurmasIndex', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Cursos::all();
        return view('cursoTurmasForm', compact('cursos'));
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
            'ano' => '',
            'curso_id' => '',
        ]);
        CursoTurmas::create($validatedData);
        return redirect('/cursoTurmas')->with('success', 'Registro adicionado com sucesso!');
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
        $data = CursoTurmas::findOrFail($id);
        $cursos = Cursos::all();
        return view('cursoTurmasForm', compact('data', 'cursos'));
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
            'ano' => '',
            'curso_id' => '',
        ]);
        CursoTurmas::whereId($id)->update($validatedData);
        return redirect('/cursoTurmas')->with('success', 'Registro editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CursoTurmas::findOrFail($id)->delete();
        return redirect('/cursoTurmas')->with('success', 'Registro excluido com sucesso!');
    }
}
