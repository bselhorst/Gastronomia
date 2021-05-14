<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//AUX_UNIDADES
Route::prefix('auxunidades')->middleware('role:almoxarifado')->group(function (){
    Route::post('/', [App\Http\Controllers\AuxUnidadesController::class, 'store'])->name('auxunidades.store');
    Route::get('/', [App\Http\Controllers\AuxUnidadesController::class, 'index'])->name('auxunidades.index');
    Route::delete('/{id}', [App\Http\Controllers\AuxUnidadesController::class, 'destroy'])->name('auxunidades.destroy');
    Route::patch('/{id}', [App\Http\Controllers\AuxUnidadesController::class, 'update'])->name('auxunidades.update');
    Route::get('/{id}/edit', [App\Http\Controllers\AuxUnidadesController::class, 'edit'])->name('auxunidades.edit');
});

//AUX_FORNECEDORES
Route::prefix('auxfornecedores')->middleware('role:almoxarifado')->group(function (){
    Route::post('/', [App\Http\Controllers\AuxFornecedoresController::class, 'store'])->name('auxfornecedores.store');
    Route::get('/', [App\Http\Controllers\AuxFornecedoresController::class, 'index'])->name('auxfornecedores.index');
    Route::delete('/{id}', [App\Http\Controllers\AuxFornecedoresController::class, 'destroy'])->name('auxfornecedores.destroy');
    Route::patch('/{id}', [App\Http\Controllers\AuxFornecedoresController::class, 'update'])->name('auxfornecedores.update');
    Route::get('/{id}/edit', [App\Http\Controllers\AuxFornecedoresController::class, 'edit'])->name('auxfornecedores.edit');
});

//ALMOXARIFADO
Route::prefix('almoxarifado')->middleware('role:almoxarifado')->group(function (){
    Route::post('/', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'store'])->name('almoxarifado.store');
    Route::get('/', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'index'])->name('almoxarifado.index');
    Route::get('/search', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'search']);
    Route::delete('/{id}', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'destroy'])->name('almoxarifado.destroy');
    Route::patch('/{id}', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'update'])->name('almoxarifado.update');
    Route::get('/create', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'create'])->name('almoxarifado.create');
    Route::get('/retirar', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'retirar'])->name('almoxarifado.retirar');
    Route::get('/{id}/edit', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'edit'])->name('almoxarifado.edit');
    Route::post('/confirmRetirar', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'confirmRetirar'])->name('almoxarifado.confirmRetirar');
    Route::get('/historicoRetiradas', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'historico_retiradas'])->name('almoxarifado.historico_retiradas');
    Route::get('/historicoEntradas', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'historico_entradas'])->name('almoxarifado.historico_entradas');
    Route::post('/{id}/entrada', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'entrada'])->name('almoxarifado.entrada');
    Route::patch('/{id}/cancelarEntrada', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'cancelarEntrada'])->name('almoxarifado.cancelarEntrada');
    Route::patch('/{id}/cancelarRetirada', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'cancelarRetirada'])->name('almoxarifado.cancelarRetirada');
    Route::get('pdf/{id}/generate', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'generatePDF'])->name('pdf.generate');
    Route::get('pdfcompleto/generate', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'generatePDFCompleto'])->name('pdfcompleto.generate');
});

//ALUNOS
Route::prefix('alunos')->middleware('role:administrativo')->group(function () {
    Route::post('/', [App\Http\Controllers\AlunosController::class, 'store'])->name('alunos.store');
    Route::get('/', [App\Http\Controllers\AlunosController::class, 'index'])->name('alunos.index');
    Route::get('/search', [App\Http\Controllers\AlunosController::class, 'search']);
    Route::delete('/{id}', [App\Http\Controllers\AlunosController::class, 'destroy'])->name('alunos.destroy');
    Route::patch('/{id}', [App\Http\Controllers\AlunosController::class, 'update'])->name('alunos.update');
    Route::get('/create', [App\Http\Controllers\AlunosController::class, 'create'])->name('alunos.create');
    Route::get('/{id}/edit', [App\Http\Controllers\AlunosController::class, 'edit'])->name('alunos.edit');
});

//CURSOS
Route::prefix('cursos')->middleware('role:administrativo')->group(function () {
    Route::post('/', [App\Http\Controllers\CursosController::class, 'store'])->name('cursos.store');
    Route::get('/', [App\Http\Controllers\CursosController::class, 'index'])->name('cursos.index');
    Route::get('/search', [App\Http\Controllers\CursosController::class, 'search']);
    Route::delete('/{id}', [App\Http\Controllers\CursosController::class, 'destroy'])->name('cursos.destroy');
    Route::patch('/{id}', [App\Http\Controllers\CursosController::class, 'update'])->name('cursos.update');
    Route::get('/create', [App\Http\Controllers\CursosController::class, 'create'])->name('cursos.create');
    Route::get('/{id}/edit', [App\Http\Controllers\CursosController::class, 'edit'])->name('cursos.edit');
    Route::get('pdf/{id}/generatePDF', [App\Http\Controllers\CursosController::class, 'generatePDF'])->name('cursos.PDF');
});

//MODULOS
Route::prefix('cursos/{idCurso}/modulos')->middleware('role:administrativo')->group(function () {
    Route::post('/', [App\Http\Controllers\CursoModulosController::class, 'store'])->name('modulos.store');
    Route::get('/', [App\Http\Controllers\CursoModulosController::class, 'index'])->name('modulos.index');
    Route::get('/search', [App\Http\Controllers\CursoModulosController::class, 'search']);
    Route::delete('/{id}', [App\Http\Controllers\CursoModulosController::class, 'destroy'])->name('modulos.destroy');
    Route::patch('/{id}', [App\Http\Controllers\CursoModulosController::class, 'update'])->name('modulos.update');
    Route::get('/create', [App\Http\Controllers\CursoModulosController::class, 'create'])->name('modulos.create');
    Route::get('/{id}/edit', [App\Http\Controllers\CursoModulosController::class, 'edit'])->name('modulos.edit');
});

//DISCIPLINAS
Route::prefix('{idCurso}/{idModulo}/disciplinas')->middleware('role:administrativo')->group(function () {
    Route::post('/', [App\Http\Controllers\CursoModuloDisciplinasController::class, 'store'])->name('disciplinas.store');
    Route::get('/', [App\Http\Controllers\CursoModuloDisciplinasController::class, 'index'])->name('disciplinas.index');
    Route::get('/search', [App\Http\Controllers\CursoModuloDisciplinasController::class, 'search']);
    Route::delete('/{id}', [App\Http\Controllers\CursoModuloDisciplinasController::class, 'destroy'])->name('disciplinas.destroy');
    Route::patch('/{id}', [App\Http\Controllers\CursoModuloDisciplinasController::class, 'update'])->name('disciplinas.update');
    Route::get('/create', [App\Http\Controllers\CursoModuloDisciplinasController::class, 'create'])->name('disciplinas.create');
    Route::get('/{id}/edit', [App\Http\Controllers\CursoModuloDisciplinasController::class, 'edit'])->name('disciplinas.edit');
});

//PATRIMONIO
Route::prefix('patrimonio')->middleware('role:patrimonio')->group(function () {
    Route::post('/', [App\Http\Controllers\PatrimonioController::class, 'store'])->name('patrimonio.store');
    Route::get('/', [App\Http\Controllers\PatrimonioController::class, 'index'])->name('patrimonio.index');
    Route::get('/search', [App\Http\Controllers\PatrimonioController::class, 'search']);
    Route::delete('/{id}', [App\Http\Controllers\PatrimonioController::class, 'destroy'])->name('patrimonio.destroy');
    Route::patch('/{id}', [App\Http\Controllers\PatrimonioController::class, 'update'])->name('patrimonio.update');
    Route::get('/create', [App\Http\Controllers\PatrimonioController::class, 'create'])->name('patrimonio.create');
    Route::get('/{id}/edit', [App\Http\Controllers\PatrimonioController::class, 'edit'])->name('patrimonio.edit');
    //Route::patch('/{id}/updatePassword', [App\Http\Controllers\UsuariosController::class, 'updatePassword']);
});

//PESSOAS
Route::prefix('pessoas')->middleware('role:administrativo')->group(function () {
    Route::post('/', [App\Http\Controllers\PessoasController::class, 'store'])->name('pessoas.store');
    Route::get('/', [App\Http\Controllers\PessoasController::class, 'index'])->name('pessoas.index');
    Route::get('/search', [App\Http\Controllers\PessoasController::class, 'search']);
    Route::delete('/{id}', [App\Http\Controllers\PessoasController::class, 'destroy'])->name('pessoas.destroy');
    Route::patch('/{id}', [App\Http\Controllers\PessoasController::class, 'update'])->name('pessoas.update');
    Route::get('/create', [App\Http\Controllers\PessoasController::class, 'create'])->name('pessoas.create');
    Route::get('/{id}/edit', [App\Http\Controllers\PessoasController::class, 'edit'])->name('pessoas.edit');
});

//USUÁRIOS
Route::prefix('usuarios')->middleware('role:admin')->group(function () {
    Route::post('/', [App\Http\Controllers\UsuariosController::class, 'store'])->name('usuarios.store');
    Route::get('/', [App\Http\Controllers\UsuariosController::class, 'index'])->name('usuarios.index');
    Route::get('/search', [App\Http\Controllers\UsuariosController::class, 'search']);
    Route::get('/create', [App\Http\Controllers\UsuariosController::class, 'create'])->name('usuarios.create');
    Route::patch('/{id}/updatePassword', [App\Http\Controllers\UsuariosController::class, 'updatePassword']);
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('pdf/preview', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'preview'])->name('pdf.preview');
//Route::get('pdf/{id}/generate', [App\Http\Controllers\AlmoxarifadoItemsController::class, 'generatePDF'])->name('pdf.generate');
//Route::get('/usuarios', [App\Http\Controllers\UsuariosController::class, 'index'])->name('UsuariosIndex');
