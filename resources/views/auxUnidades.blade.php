@extends('layouts.layout')

@section('page-title')
<span class="font-weight-semibold">Auxiliar Unidade</span>
@endsection

@section('page-title-buttons')
<!--<a href="#" class="btn btn-link btn-float text-default"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>-->
@endsection

@section('breadcrumb')
<a href="tecnologia" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
<a href="#" class="breadcrumb-item active"><i class="icon-price-tags mr-2"></i> Aux Unidades</a>
@endsection

@section('content')
    @if (\Session::has('success'))
    <div class="alert alert-success bg-white alert-styled-left alert-arrow-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <h6 class="alert-heading font-weight-semibold mb-1">Sucesso</h6>
        {!!\Session::get('success')!!}
    </div>
    @endif
    <!-- Form validation -->

    <div class="card">
        <div class="card-body">
            <form class="form-validate-jquery" method="POST" action="{{ (@$dataEdit) ? route('auxunidades.update', $dataEdit->id) : route('auxunidades.store') }}">
                @csrf
                @if(isset($dataEdit))
                    @method('PATCH')
                @endif
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">{{ (@$dataEdit) ? 'Editar' : 'Cadastrar'}}</legend>
                    <div class="form-group row" style="justify-content: center">
                        @if(isset($dataEdit))
                            <a href="/auxunidades" style="color: red">Você está editando registro, clique aqui para cancelar a edição</a>
                        @endif
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4"></div>
                        <label class="col-form-label col-lg-1">Unidade<span class="text-danger"></span></label>
                        <div class="col-lg-3">
                            <input type="text" name="unidade" class="form-control" placeholder="Ex: Kg" value="{{ (@$dataEdit) ? $dataEdit->unidade : ''}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4"></div>
                        <label class="col-form-label col-lg-1">Descrição<span class="text-danger"></span></label>
                        <div class="col-lg-3">
                            <input type="text" name="descricao" class="form-control" placeholder="Ex: Kilograma" value="{{ (@$dataEdit) ? $dataEdit->descricao : ''}}">
                        </div>
                    </div>
                </fieldset>
                <div class="d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-primary ml-3">{{(@$dataEdit) ? 'Editar' : 'Cadastrar' }}<i class="icon-add ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <ul class="fab-menu fab-menu-fixed fab-menu-bottom-right" data-fab-toggle="click" data-fab-state="closed">
            <li>
                <a href="#" class="fab-menu-btn btn bg-teal-400 btn-float rounded-round btn-icon">
                    <i class="fab-icon-open icon-paragraph-justify3"></i>
                    <i class="fab-icon-close icon-cross2"></i>
                </a>

                <ul class="fab-menu-inner">
                    @role('patrimonio')
                    <li>
                        <div data-fab-label="Cadastrar">
                            <a href="{{ route('patrimonio.create') }}" class="btn btn-light rounded-round btn-icon btn-float">
                                <i class="icon-plus2"></i>
                            </a>
                        </div>
                    </li>
                    @endrole
                </ul>
            </li>
        </ul>
        <div class="col-xl-12">
            <!-- Support tickets -->
            <div class="card">
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th>Tabela de Patrimônios</th>
                                <th class="text-center" style="width: 20px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-active table-border-double">
                                <td>Unidade</td>
                                <td>Descrição</td>
                                <td class="text-right">
                                    <span class="badge bg-blue badge-pill">{{$datas->total()}}</span>
                                </td>
                            </tr>
                            @foreach($datas as $data)
                                <tr>
                                    <td>
                                        <div class="font-weight-semibold">{{ $data->unidade }}</div>
                                    </td>
                                    <td>
                                        <div class="font-weight-semibold">{{ $data->descricao }}</div>
                                    </td>
                                    </td>
                                    <td class="text-right">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <a href="{{ route('auxunidades.edit', $data->id) }}" class="dropdown-item"><i class="icon-pencil7"></i> Editar</a>

                                                    {{-- <form method="POST" action="{{ route('auxunidades.destroy', $data->id) }}" onsubmit="return confirm('Deseja deletar esse dado?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item"><i class="icon-cross2 text-danger"></i> Deletar</button>
                                                    </form> --}}

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="">
                                <td colspan=5>
                                    @php
                                        //$url = '';
                                        //request()->descricao? $url.='&descricao='.request()->descricao : '';
                                        //request()->data? $url.='&patrimonio='.request()->descricao : '';
                                    @endphp
                                    <ul class="pagination pagination-pager pagination-rounded justify-content-center">
                                        @if ($datas->previousPageUrl())
                                    <li class="page-item"><a href="{{ $datas->previousPageUrl() }}{{ $url }}" class="page-link">← &nbsp; Anterior</a></li>
                                        @endif
                                        @if (!$datas->previousPageUrl())
                                            <li class="page-item disabled"><a href="{{ $datas->previousPageUrl() }}" class="page-link">← &nbsp; Anterior</a></li>
                                        @endif
                                        @if ($datas->nextPageUrl())
                                            <li class="page-item"><a href="{{ $datas->nextPageUrl() }}{{ $url }}" class="page-link">Próximo &nbsp; →</a></li>
                                        @endif
                                        @if (!$datas->nextPageUrl())
                                            <li class="page-item disabled"><a href="{{ $datas->nextPageUrl() }}" class="page-link">Próximo &nbsp; →</a></li>
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
