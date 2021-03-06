@php
	//$name = explode(' ', Auth::user()->name);
@endphp
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sistema de Gerenciamento Escolar</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('backend/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('backend/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('backend/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('backend/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('backend/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ asset('backend/global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('backend/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('backend/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('backend/global_assets/js/plugins/ui/fab.min.js') }}"></script>
    <script src="{{ asset('backend/global_assets/js/plugins/forms/validation/validate.min.js') }}"></script>
	<script src="{{ asset('backend/global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
	<script src="{{ asset('backend/global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
	<script src="{{ asset('backend/global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script src="{{ asset('backend/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
	<script src="{{ asset('backend/global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
	<script src="{{ asset('backend/global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
	<script src="{{ asset('backend/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>

	<script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <script src="{{ asset('backend/global_assets/js/demo_pages/dashboard.js') }}"></script>
	<script src="{{ asset('backend/global_assets/js/demo_pages/form_validation.js') }}"></script>
	<script src="{{ asset('backend/global_assets/js/demo_pages/form_select2.js') }}"></script>
	<script src="{{ asset('backend/global_assets/js/demo_pages/form_multiselect.js') }}"></script>
	<script src="{{ asset('backend/global_assets/js/demo_pages/components_modals.js') }}"></script>
	<!-- /theme JS files -->

</head>
<body>
	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand" style="padding-top: 0; padding-bottom: 0;">
			<a href="/" class="d-inline-block" style="padding-left: 80px">
				<img src="{{ asset('backend/global_assets/images/logo_gastronomia.jpeg') }}"  style="height: 48px">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>

			<span class="ml-md-3 mr-md-auto">Sistema de Gestão Escolar - SGE</span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
						@php
							$user = explode(' ', Auth::user()->name);
						@endphp
						{{ $user[0]." ".last($user) }}
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Configurações</a>
						<div class="dropdown-divider"></div>
						<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="color: #E57373"><i class="icon-switch2"></i> Logout</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="/" class="nav-link">
								<i class="icon-home4"></i>
								<span>
									Principal
								</span>
							</a>
						</li>
						<!-- /main -->

                        <!-- administrativo -->
						@role(['administrativo', 'alunos'])
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Administrativo</div> <i class="icon-menu" title="Forms"></i></li>
                            @role('administrativo')
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-users"></i> <span>Alunos</span></a>
                                <ul class="nav nav-group-sub" data-submenu-title="JSON forms" style="display: none;">
                                    <li class="nav-item"><a href="{{ route('alunos.create') }}" class="nav-link">Cadastrar Aluno</a></li>
                                    <li class="nav-item"><a href="{{ route('alunos.index') }}" class="nav-link">Lista de Alunos</a></li>
                                </ul>
                            </li>
                            @endrole
                            @role('administrativo')
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-certificate"></i> <span>Cursos</span></a>
                                <ul class="nav nav-group-sub" data-submenu-title="JSON forms" style="display: none;">
                                    <li class="nav-item"><a href="{{ route('cursos.create') }}" class="nav-link">Cadastrar Curso</a></li>
                                    <li class="nav-item"><a href="{{ route('cursos.index') }}" class="nav-link">Lista de Cursos</a></li>
                                </ul>
                            </li>
                            @endrole
                            @role('administrativo')
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-users"></i> <span>Funcionários</span></a>
                                <ul class="nav nav-group-sub" data-submenu-title="JSON forms" style="display: none;">
                                    <li class="nav-item"><a href="{{ route('pessoas.create') }}" class="nav-link">Cadastrar</a></li>
                                    <li class="nav-item"><a href="{{ route('pessoas.index') }}" class="nav-link">Listar</a></li>
                                </ul>
                            </li>
                            @endrole
                            @role('administrativo')
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-book"></i> <span>Turmas</span></a>
                                <ul class="nav nav-group-sub" data-submenu-title="JSON forms" style="display: none;">
                                    <li class="nav-item"><a href="{{ route('cursoTurmas.create') }}" class="nav-link">Cadastrar Turma</a></li>
                                    <li class="nav-item"><a href="{{ route('cursoTurmas.index') }}" class="nav-link">Lista de Turmas</a></li>
                                </ul>
                            </li>
                            @endrole
						@endrole
						<!-- /administrativo -->

                        <!-- almoxarifado -->
						@role(['patrimonio', 'almoxarifado'])
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Almoxarifado e Patrimônio</div> <i class="icon-menu" title="Forms"></i></li>
                            @role('almoxarifado')
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-price-tags"></i> <span>Almoxarifado</span></a>
                                <ul class="nav nav-group-sub" data-submenu-title="JSON forms" style="display: none;">
                                    <li class="nav-item"><a href="{{ route('auxfornecedores.index') }}" class="nav-link">Aux. Fornecedores</a></li>
                                    <li class="nav-item"><a href="{{ route('auxunidades.index') }}" class="nav-link">Aux. Unidades</a></li>
                                    <li class="nav-item"><a href="{{ route('almoxarifado.index') }}" class="nav-link">Almoxarifado</a></li>
                                    <li class="nav-item"><a href="{{ route('almoxarifado.retirar') }}" class="nav-link">Retirar Itens</a></li>
                                    <li class="nav-item"><a href="{{ route('almoxarifado.historico_entradas') }}" class="nav-link">Histórico de Entradas</a></li>
                                    <li class="nav-item"><a href="{{ route('almoxarifado.historico_retiradas') }}" class="nav-link">Histórico de Retiradas</a></li>
                                </ul>
                            </li>
                            @endrole
                            @role('patrimonio')
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-barcode2"></i> <span>Patrimônio</span></a>
                                <ul class="nav nav-group-sub" data-submenu-title="JSON forms" style="display: none;">
                                    <li class="nav-item"><a href="{{ route('patrimonio.create') }}" class="nav-link">Cadastrar</a></li>
                                    <li class="nav-item"><a href="{{ route('patrimonio.index') }}" class="nav-link">Listar</a></li>
                                </ul>
                            </li>
                            @endrole
						@endrole
						<!-- /almoxarifado -->

						<!-- Usuários -->
						@role('admin')
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Usuários</div> <i class="icon-menu" title="Forms"></i></li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-users"></i> <span>Usuários</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="JSON forms" style="display: none;">
								<li class="nav-item"><a href="{{ route('usuarios.create') }}" class="nav-link">Cadastrar</a></li>
								<li class="nav-item"><a href="{{ route('usuarios.index') }}" class="nav-link">Listar</a></li>
							</ul>
						</li>
						@endrole
						<!-- /usuarios -->

						<hR>
						<li class="nav-item">
							<a href="#" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
								<i class="icon-switch2" style="color: #E57373;"></i>
								<span style="color: #E57373">
									Logout
								</span>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</a>
						</li>
					</ul>
				</div>
				<!-- /main navigation -->
			</div>
			<!-- /sidebar content -->
		</div>
		<!-- /main sidebar -->
    <!-- Main content -->
	<div class="content-wrapper">

<!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>@yield('page-title')</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    @yield('page-title-buttons')
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    @yield('breadcrumb')
                </div>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
        <!-- /page header -->

        <!-- Content area -->
        <div class="content">

        @yield('content')

        </div>
        <!-- /content area -->

        <!-- Footer -->
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                    <i class="icon-unfold mr-2"></i>
                    Footer
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navbar-footer">
                <span class="navbar-text">
                    &copy; 2020. Gastronomia
                </span>
            </div>
        </div>
        <!-- /footer -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

</body>
</html>
