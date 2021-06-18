<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TurmaAlunos;
use App\Models\CursoTurmas;
use App\Models\Alunos;
use Illuminate\Support\Facades\DB;

class TurmaAlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($turma_id)
    {
        //$data = TurmaAlunos::orderBy('id')->paginate(15);
        $turma = CursoTurmas::findOrFail($turma_id);
        $alunos = Alunos::orderBy('nome')->get();
        $data = DB::table('turma_alunos')->select('alunos.nome', 'turma_alunos.id', 'turma_alunos.aluno_id')
        ->leftJoin('alunos', 'turma_alunos.aluno_id', 'alunos.id')
        ->where('turma_alunos.turma_id', '=', $turma_id)
        ->paginate(15);
        return view('turmaAlunos', compact('data', 'alunos', 'turma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'turma_id' => 'required',
            'aluno_id' => 'required',
        ]);
        TurmaAlunos::create($validatedData);
        return redirect('/cursoTurmas/'.$validatedData['turma_id'].'/turmaAlunos')->with('success', 'Registro adicionado com sucesso!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($turma_id, $id)
    {
        TurmaAlunos::findOrFail($id)->delete();
        return redirect('/cursoTurmas/'.$turma_id.'/turmaAlunos')->with('success', 'Registro excluído com sucesso!');
    }
}
