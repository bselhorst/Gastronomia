<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Gastronomia</title>

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
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
	<!-- /theme JS files -->

</head>

<body>
	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
                                <!--<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>-->
                                <img class="mb-3" src="{{ asset('backend/global_assets/images/logo_gastronomia.jpeg') }}" width="100" height="100" alt="">
								<h5 class="mb-0">Faça login com a sua conta</h5>
								<span class="d-block text-muted">Entre com seus dados abaixo</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">

                                <input id="username" type="text" placeholder="Username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

								<!--<input type="text" class="form-control" placeholder="Username">-->
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">

                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
								<!--<input type="password" class="form-control" placeholder="Password">-->
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group text-center">
								<button type="submit" class="btn btn-primary">
                                    Acessar
                                </button>
							</div>

							<!--<div class="text-center">
								<a href="login_password_recover.html">Forgot password?</a>
							</div>-->
						</div>
					</div>
				</form>
				<!-- /login form -->

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
						&copy; 2020. Escola de Gastronomia
					</span>

					<ul class="navbar-nav ml-lg-auto">
						<!--<li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
						<li class="nav-item"><a href="http://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
						<li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>-->
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>