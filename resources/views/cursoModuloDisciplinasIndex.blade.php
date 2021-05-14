@extends('layouts.layout')

@section('page-title')
<span class="font-weight-semibold">Disciplinas</span>
@endsection

@section('page-title-buttons')
<!--<a href="#" class="btn btn-link btn-float text-default"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>-->
@endsection

@section('breadcrumb')
<a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
<a href="/cursos" class="breadcrumb-item"><i class="icon-certificate mr-2"></i> Cursos</a>
<a href="/{{$modulo_id}}/modulos" class="breadcrumb-item"><i class="icon-grid6 mr-2"></i> Módulos</a>
<a href="#" class="breadcrumb-item active"><i class="icon-grid6 mr-2"></i> Disciplinas</a>
@endsection

@section('content')

    <!-- Form validation -->
    <div class="card">
        <div class="card-body">
            <form class="form-validate-jquery" method="POST" action="{{ @$item ? route('disciplinas.update', [$curso_id, $modulo_id, $item->id]) : route('disciplinas.store', [$curso_id, $modulo_id]) }}">
                @csrf
                @if (@$item)
                    @method('PATCH')
                @endif
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">{{ (@$item)? 'Editar' : 'Cadastrar'}}</legend>
                    <div class="form-group row" style="justify-content: center">
                        @if(isset($item))
                        <a href="/{{$curso_id}}/{{$modulo_id}}/disciplinas/" style="color: red">Você está editando registro, clique aqui para cancelar a edição</a>
                        @endif
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2"></div>
                        <label class="col-form-label col-lg-2">Nome da Disciplina<span class="text-danger">*</span></label>
                        <div class="col-lg-6">
                            <input type="text" name="nome" class="form-control" placeholder="Nome Completo" value='{{ @$item->nome }}' required>
                            <input type="hidden" name="curso_id" value="{{ $curso_id }}">
                            <input type="hidden" name="modulo_id" value="{{ $modulo_id }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2"></div>
                        <label class="col-form-label col-lg-2">Carga Horária<span class="text-danger">*</span></label>
                        <div class="col-lg-1">
                            <input type="number" name="carga_horaria" class="form-control" value='{{ @$item->carga_horaria }}' required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2"></div>
                        <label class="col-form-label col-lg-2">Competência<span class="text-danger">*</span></label>
                        <div class="col-lg-6">
                            <textarea name="competencia" class="form-control">{{ @$item->competencia }}</textarea>
                        </div>
                    </div>
                </fieldset>
                <div class="d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-primary ml-3">{{ (@$item)? 'Editar' : 'Cadastrar' }} <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <!-- Support tickets -->
            <div class="card">
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th colspan="3">Tabela de Disciplinas</th>
                                <th class="text-center" style="width: 20px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-active table-border-double">
                                <td>Nome</td>
                                <td>Carga Horária</td>
                                <td>Competência</td>
                                <td class="text-right">
                                    <span class="badge bg-blue badge-pill">{{$data->total()}}</span>
                                </td>
                            </tr>
                            @foreach($data as $item)
                                <tr>
                                    <td>
                                        <div class="font-weight-semibold">{{ $item->nome }}</div>
                                    </td>
                                    <td>
                                        <div class="font-weight-semibold">{{ $item->carga_horaria }}</div>
                                    </td>

                                    <td>
                                        <div class="font-weight-semibold">{{ $item->competencia }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{ route('disciplinas.edit', [$curso_id, $modulo_id, $item->id]) }}" class="dropdown-item"><i class="icon-pencil"></i> Editar</a>
                                                    <form method="POST" action="{{ route('disciplinas.destroy', [$curso_id, $modulo_id, $item->id]) }}" onsubmit="return confirm('Deseja deletar esse dado?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item"><i class="icon-cross2 text-danger"></i> Deletar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="">
                                <td colspan="6">
                                    @php
                                        if(request()->name){
                                            $url = '&name='.request()->name;
                                        }else{
                                            $url='';
                                        }
                                    @endphp
                                    <ul class="pagination pagination-pager pagination-rounded justify-content-center">
                                        @if ($data->previousPageUrl())
                                    <li class="page-item"><a href="{{ $data->previousPageUrl() }}{{ $url }}" class="page-link">← &nbsp; Anterior</a></li>
                                        @endif
                                        @if (!$data->previousPageUrl())
                                            <li class="page-item disabled"><a href="{{ $data->previousPageUrl() }}" class="page-link">← &nbsp; Anterior</a></li>
                                        @endif
                                        @if ($data->nextPageUrl())
                                            <li class="page-item"><a href="{{ $data->nextPageUrl() }}{{ $url }}" class="page-link">Próximo &nbsp; →</a></li>
                                        @endif
                                        @if (!$data->nextPageUrl())
                                            <li class="page-item disabled"><a href="{{ $data->nextPageUrl() }}" class="page-link">Próximo &nbsp; →</a></li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
