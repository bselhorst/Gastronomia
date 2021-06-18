@extends('layouts/layoutCards')
@section('content')
<div class="w-100 order-2 order-md-1">

    <!-- Grid -->
    <div class="mb-3 pt-2">
        <h6 class="mb-0 font-weight-semibold">
            Sistemas
        </h6>
    </div>
    <div class="row">
        @role('administrativo')
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body" style="padding: 0">
                    <div class="card-img-actions" align="center" style="padding: 20px">
                        <a href="{{ route("alunos.index") }}" data-popup="lightbox">
                            <i class="icon-users icon-4x"></i>
                            <span class="card-img-actions-overlay card-img">
                                Acessar
                            </span>
                        </a>
                        <br>
                        <br>
                        <h5 class="mb-0 font-weight-semibold">Alunos</h5>
                    </div>
                </div>
            </div>
        </div>
        @endrole
        @role('administrativo')
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body" style="padding: 0">
                    <div class="card-img-actions" align="center" style="padding: 20px">
                        <a href="{{ route("pessoas.index") }}" data-popup="lightbox">
                            <i class="icon-users icon-4x"></i>
                            <span class="card-img-actions-overlay card-img">
                                Acessar
                            </span>
                        </a>
                        <br>
                        <br>
                        <h5 class="mb-0 font-weight-semibold">Funcionários</h5>
                    </div>
                </div>
            </div>
        </div>
        @endrole
        @role('almoxarifado')
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body" style="padding: 0">
                    <div class="card-img-actions" align="center" style="padding: 20px">
                        <a href="{{ route("almoxarifado.index") }}" data-popup="lightbox">
                            <i class="icon-price-tags2 icon-4x"></i>
                            <span class="card-img-actions-overlay card-img">
                                Acessar
                            </span>
                        </a>
                        <br>
                        <br>
                        <h5 class="mb-0 font-weight-semibold">Almoxarifado</h5>
                    </div>
                </div>
            </div>
        </div>
        @endrole
        @role('administrativo')
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body" style="padding: 0">
                    <div class="card-img-actions" align="center" style="padding: 20px">
                        <a href="{{ route("cursos.index") }}" data-popup="lightbox">
                            <i class="icon-certificate icon-4x"></i>
                            <span class="card-img-actions-overlay card-img">
                                Acessar
                            </span>
                        </a>
                        <br>
                        <br>
                        <h5 class="mb-0 font-weight-semibold">Cursos</h5>
                    </div>
                </div>
            </div>
        </div>
        @endrole
        @role('patrimonio')
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body" style="padding: 0">
                    <div class="card-img-actions" align="center" style="padding: 20px">
                        <a href="{{ route("patrimonio.index") }}" data-popup="lightbox">
                            <i class="icon-barcode2 icon-4x"></i>
                            <span class="card-img-actions-overlay card-img">
                                Acessar
                            </span>
                        </a>
                        <br>
                        <br>
                        <h5 class="mb-0 font-weight-semibold">Patrimônio</h5>
                    </div>
                </div>
            </div>
        </div>
        @endrole
        @role('admin')
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body" style="padding: 0">
                    <div class="card-img-actions" align="center" style="padding: 20px">
                        <a href="{{ route("usuarios.index") }}" data-popup="lightbox">
                            <i class="icon-users icon-4x"></i>
                            <span class="card-img-actions-overlay card-img">
                                Acessar
                            </span>
                        </a>
                        <br>
                        <br>
                        <h5 class="mb-0 font-weight-semibold">Usuários</h5>
                    </div>
                </div>
            </div>
        </div>
        @endrole
    </div>
    <!-- /grid -->

</div>
@endsection
