@extends('layouts/layout')

@section('page-title')
<span class="font-weight-semibold">Turmas</span> - {{ @$data ? 'Editar' : 'Cadastrar' }}
@endsection

@section('page-title-buttons')
@endsection

@section('breadcrumb')
<a href="../tecnologia" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
<a href="{{ route('cursos.index') }}" class="breadcrumb-item"><i class="icon-certificate mr-2"></i> Cursos</a>
<a href="{{ route('cursoTurmas.index') }}" class="breadcrumb-item"><i class="icon-book mr-2"></i> Turmas</a>
<span class="breadcrumb-item active">{{ @$data ? 'Editar' : 'Cadastrar' }}</span>
@endsection

@section('content')
<script src="{{ asset('backend/assets/js/jquery.mask.js') }}" type="text/javascript"></script>

<!-- Form validation -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">{{ @$data ? 'Editar Cadastro' : 'Cadastrar Curso' }}</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form class="form-validate-jquery" method="POST" action="{{ @$data ? route('cursoTurmas.update', $data->id) : route('cursoTurmas.store') }}">
            @csrf
            @if (@$data)
                @method('PATCH')
            @endif
            <fieldset class="mb-3">
                <legend class="text-uppercase font-size-sm font-weight-bold">Dados Gerais</legend>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Nome da Turma<span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" name="nome" class="form-control" required placeholder="Nome do curso" value="{{ @$data->nome }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Ano</label>
                    <div class="col-lg-4">
                        <input type="number" min="2010" max="3000" name="ano" class="form-control" placeholder="" autocomplete="off" value="{{ @$data->ano }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Curso vinculado</label>
                    <div class="col-lg-4">
                        <select class="form-control select-search select2-hidden-accessible" name="curso_id" id="curso_id" tabindex="-1" aria-hidden="true" required>
                            @if (count($cursos) == 0)
                                <option value="">Sem Cursos</option>
                            @else
                            <option value="">Selecione uma Curso</option>
                            @endif
                            @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}" {{ (@$data->curso_id == $curso->id) ? 'selected' : '' }}>{{ $curso->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </fieldset>
            <div class="d-flex justify-content-end align-items-center">
                <button type="reset" class="btn btn-light" id="reset">Reset <i class="icon-reload-alt ml-2"></i></button>
                <button type="submit" class="btn btn-primary ml-3">{{ @$data ? 'Editar' : 'Cadastrar' }} <i class="icon-paperplane ml-2"></i></button>
            </div>
        </form>
    </div>
</div>

<!-- /form validation -->
@endsection
