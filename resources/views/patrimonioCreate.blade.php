@extends('layouts/layout')

@section('page-title')
<span class="font-weight-semibold">Patrimônio</span> - Cadastrar
@endsection

@section('page-title-buttons')
@endsection

@section('breadcrumb')
<a href="../tecnologia" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
<a href="{{ route('usuarios.index') }}" class="breadcrumb-item"><i class="icon-barcode2 mr-2"></i> Patrimônio</a>
<span class="breadcrumb-item active">Cadastrar</span>
@endsection

@section('content')

<!-- Form validation -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Cadastrar Patrimônio</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form class="form-validate-jquery" method="POST" action="{{ route('patrimonio.store') }}">
            @csrf
            <fieldset class="mb-3">
                <legend class="text-uppercase font-size-sm font-weight-bold">Dados do patimonio</legend>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Número do Patrimônio</label>
                    <div class="col-lg-2">
                        <input type="text" name="numero_patrimonio" class="form-control" placeholder="Número do Patrimônio">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Número de Série</label>
                    <div class="col-lg-2">
                        <input type="text" name="numero_serie" class="form-control" placeholder="Número de série">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Descricao <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" name="descricao" class="form-control" required placeholder="Descrição" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Localização <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" name="localizacao" class="form-control" required placeholder="Localização" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <label class="col-form-label col-lg-2">Observação</label>
                    <div class="col-lg-4">
                        <textarea class="form-control" name="observacao"></textarea>
                    </div>
                </div>

            </fieldset>

            <div class="d-flex justify-content-end align-items-center">
                <button type="reset" class="btn btn-light" id="reset">Reset <i class="icon-reload-alt ml-2"></i></button>
                <button type="submit" class="btn btn-primary ml-3">Cadastrar <i class="icon-paperplane ml-2"></i></button>
            </div>
        </form>
    </div>
</div>
<!-- /form validation -->
@endsection
