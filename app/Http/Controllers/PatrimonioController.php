<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Patrimonio;

class PatrimonioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$patrimonio = Patrimonio::orderBy('id')->paginate(10);
        $patrimonios = DB::table('patrimonios')->paginate(15);
        return view('patrimonioIndex', compact('patrimonios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patrimonioCreate');
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
            'numero_patrimonio' => '',
            'numero_serie' => '',
            'descricao' => 'required',
            'localizacao' => '',
            'observacao' => '',
        ]);

        $create = Patrimonio::create($validatedData);
        //DB::table('patrimonios')->insert($validatedData);
        return redirect('/patrimonio')->with('success', 'Registro adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patrimonio = Patrimonio::findOrFail($id);
        return view('patrimonioEdit', compact('patrimonio'));
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
            'numero_patrimonio' => '',
            'numero_serie' => '',
            'descricao' => 'required',
            'localizacao' => '',
            'observacao' => '',
        ]);
        Patrimonio::whereId($id)->update($validatedData);
        return redirect('/patrimonio')->with('success', 'Registro editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patrimonio::findOrFail($id)->delete();
        return redirect('/patrimonio');
    }

    public function search(Request $request){
        $descricao = $request->get('descricao');
        $patrimonio = $request->get('patrimonio');
        $patrimonios = DB::table('patrimonios')->where([['descricao', 'like', '%'.$descricao.'%'], ['numero_patrimonio', 'like', '%'.$patrimonio.'%']])->paginate(15);
        return view('patrimonioIndex', compact('patrimonios'));
    }

}
