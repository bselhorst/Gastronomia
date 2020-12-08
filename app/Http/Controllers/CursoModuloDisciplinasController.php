<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CursoModuloDisciplinas;

class CursoModuloDisciplinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($curso_id, $modulo_id)
    {
        $data = CursoModuloDisciplinas::where('modulo_id', $modulo_id)->paginate(15);
        return view('cursoModuloDisciplinasIndex', compact('data', 'curso_id', 'modulo_id'));
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
    public function store(Request $request, $curso_id, $modulo_id)
    {
        $validatedData = $request->validate([
            'modulo_id' => 'required',
            'nome' => 'required',
            'carga_horaria' => '',
            'competencia' => '',
        ]);
        CursoModuloDisciplinas::create($validatedData);
        $data = CursoModuloDisciplinas::where('modulo_id', $modulo_id)->paginate(15);
        return view('cursoModuloDisciplinasIndex', compact('data', 'curso_id', 'modulo_id'));
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
    public function edit($curso_id, $modulo_id, $id)
    {
        $data = CursoModuloDisciplinas::where('modulo_id', $modulo_id)->paginate(15);
        $item = CursoModuloDisciplinas::findOrFail($id);
        return view('cursoModuloDisciplinasIndex', compact('data', 'curso_id', 'modulo_id', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $curso_id, $modulo_id, $id)
    {
        $validatedData = $request->validate([
            'modulo_id' => 'required',
            'nome' => 'required',
            'carga_horaria' => '',
            'competencia' => '',
        ]);

        CursoModuloDisciplinas::findOrFail($id)->update($validatedData);
        return redirect('/'.$curso_id.'/'.$modulo_id.'/disciplinas')->with('success', 'Registro deletado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($curso_id, $modulo_id, $id)
    {
        CursoModuloDisciplinas::findOrFail($id)->delete();
        $data = CursoModuloDisciplinas::where('modulo_id', $modulo_id)->paginate(15);
        return redirect('/'.$curso_id.'/'.$modulo_id.'/disciplinas')->with('success', 'Registro deletado com sucesso!');
    }
}
