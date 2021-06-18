@extends('layouts.layout')

@section('page-title')
<span class="font-weight-semibold">Turma: {{ $turma->nome }}</span><br>
<span class="font-weight-semibold">Lista de Alunos</span>
@endsection

@section('page-title-buttons')
<!--<a href="#" class="btn btn-link btn-float text-default"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>-->
@endsection

@section('breadcrumb')
<a href="tecnologia" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
<a href="#" class="breadcrumb-item active"><i class="icon-users mr-2"></i> Alunos</a>
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
            <form class="form-validate-jquery" method="POST" action="{{ (@$dataEdit) ? route('turmaAlunos.update', $dataEdit->id) : route('turmaAlunos.store', [$turma->id]) }}">
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
                        <div class="col-lg-3"></div>
                        <label class="col-form-label col-lg-1">Aluno<span class="text-danger"></span></label>
                        <div class="col-lg-4">
                            <input type='hidden' name='turma_id' value='{{ $turma->id }}'>
                            <select class="form-control select-search select2-hidden-accessible" name="aluno_id" id="aluno_id" tabindex="-1" aria-hidden="true" required>
                                @if (count($alunos) == 0)
                                    <option value="">Não existem alunos cadastrados</option>
                                @else
                                <option value="">Selecione uma Aluno</option>
                                @endif
                                @foreach ($alunos as $aluno)
                                    <option value="{{ $aluno->id }}" {{ (@$data->aluno_id == $aluno->id) ? 'selected' : '' }}>{{ $aluno->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </fieldset>
                <div class="d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-primary ml-3">{{(@$dataEdit) ? 'Editar' : 'Adicionar' }}<i class="icon-add ml-2"></i></button>
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
                                <th>Tabela de Alunos</th>
                                <th class="text-center" style="width: 20px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-active table-border-double">
                                <td>Aluno</td>
                                <td class="text-right">
                                    <span class="badge bg-blue badge-pill">{{$data->total()}}</span>
                                </td>
                            </tr>
                            @foreach($data as $item)
                                <tr>
                                    <td>
                                        <div class="font-weight-semibold">{{ $item->nome }}</div>
                                    </td>
                                    </td>
                                    <td class="text-right">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <form method="POST" action="{{ route('turmaAlunos.destroy', [$turma->id, $item->id]) }}" onsubmit="return confirm('Deseja deletar esse dado?')">
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
                                <td colspan=5>
                                    @php
                                        //$url = '';
                                        //request()->descricao? $url.='&descricao='.request()->descricao : '';
                                        //request()->data? $url.='&patrimonio='.request()->descricao : '';
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
