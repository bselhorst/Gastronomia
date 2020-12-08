<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alunos;
use Illuminate\Support\Facades\DB;

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Alunos::orderBy('nome')->paginate(15);
        return view('alunosIndex', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alunosForm');
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
            'filiacao1' => '',
            'filiacao2' => '',
            'rg' => '',
            'orgaoExp' => '',
            'cpf' => '',
            'sexo' => '',
            'dataNascimento' => '',
            'rua' => '',
            'numero' => '',
            'apt' => '',
            'bairro' => '',
            'municipio' => '',
            'complemento' => '',
            'cep' => '',
            'telefone' => '',
            'celular' => '',
            'email' => '',
            'nomeDeEmergencia' => '',
            'numeroEmergencia' => '',
            'trabalha' => '',
            'localTrabalho' => '',
            'telefoneTrabalho' => '',
            'ocupacaoTrabalho' => '',
            'tempoTrabalho' => '',
            'possuiCarteiraDeTrabalho' => '',
            'cadastroCine' => '',
            'rendaFamiliar' => '',
            'estuda' => '',
            'escolaridade' => '',
            'nis' => '',
            'auxilioFinanceiro' => '',
        ]);
        $show = Alunos::create($validatedData);
        return redirect('/alunos')->with('success', 'Registro adicionado com sucesso!');
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
        $data = Alunos::findOrFail($id);
        return view('alunosForm', compact('data'));
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
            'filiacao1' => '',
            'filiacao2' => '',
            'rg' => '',
            'orgaoExp' => '',
            'cpf' => '',
            'sexo' => '',
            'dataNascimento' => '',
            'rua' => '',
            'numero' => '',
            'apt' => '',
            'bairro' => '',
            'municipio' => '',
            'complemento' => '',
            'cep' => '',
            'telefone' => '',
            'celular' => '',
            'email' => '',
            'nomeDeEmergencia' => '',
            'numeroEmergencia' => '',
            'trabalha' => '',
            'localTrabalho' => '',
            'telefoneTrabalho' => '',
            'ocupacaoTrabalho' => '',
            'tempoTrabalho' => '',
            'possuiCarteiraDeTrabalho' => '',
            'cadastroCine' => '',
            'rendaFamiliar' => '',
            'estuda' => '',
            'escolaridade' => '',
            'nis' => '',
            'auxilioFinanceiro' => '',
        ]);
        Alunos::whereId($id)->update($validatedData);
        return redirect('/alunos')->with('success', 'Registro editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alunos::findOrFail($id)->delete();
        return redirect('/alunos')->with('success', 'Registro editado com sucesso!');
    }

    public function search(Request $request)
    {
        $data = DB::table('Alunos')->where('nome', 'Like', '%'.$request->get('name').'%')->paginate(15);
        return view('AlunosIndex', compact('data'));
    }
}
