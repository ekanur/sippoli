<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}" />
	<link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Sippoli</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <style>
    	.content{
    		margin-top: 0px !important;
    	}

    	.panel-heading .breadcrumb{
            padding:0px;
            margin-bottom: 0px;
            background-color: transparent;
            border-radius: 0px;
        }
    </style>
    @stack("style")
</head>

<body>

	<div class="wrapper">
	    <div class="sidebar" data-color="purple" data-image="{{ asset('img/sidebar-1.jpg') }}">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="{{url('/')}}" class="simple-text">
					SIPPOLI
				</a>
			</div>

	    	<div class="sidebar-wrapper">
					            <ul class="nav">
	                <li @if (Request::is("/")) class="active" @endif>
	                    <a href="{{ url('/') }}">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>
 	               <li @if (Request::is("atlet") || Request::is("atlet/*")) class="active" @endif>
	                    <a href="{{ url('/atlet') }}">
	                        <i class="material-icons">person</i>
	                        <p>Atlet</p>
	                    </a>
	                </li>
	                <li @if (Request::is("program") || Request::is("program/*")) class="active" @endif>
	                    <a href="{{ url('/program') }}">
	                        <i class="material-icons">content_paste</i>
	                        <p>Program</p>
	                    </a>
	                </li>
	                <li @if (Request::is("evaluasi") || Request::is("evaluasi/*")) class="active" @endif>
	                    <a href="{{ url('/evaluasi') }}">
	                        <i class="material-icons">library_books</i>
	                        <p>Evaluasi</p>
	                    </a>
	                </li>
	            </ul>
	    	</div>
		</div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
				</div>
			</nav>

	        <div class="content">
				@yield("content")
	    	</div>

			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						{{-- <ul>
							<li>
								<a href="#">
									Home
								</a>
							</li>
							<li>
								<a href="#">
									Company
								</a>
							</li>
							<li>
								<a href="#">
									Portfolio
								</a>
							</li>
							<li>
								<a href="#">
								   Blog
								</a>
							</li>
						</ul> --}}
					</nav>
					<p class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.google.com">Laraveliyah UM</a>, made with love for a better web
					</p>
				</div>
			</footer>
		</div>
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="{{ asset('js/jquery-3.1.0.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/material.min.js') }}" type="text/javascript"></script>

	<!--  Charts Plugin -->
	{{-- <script src="{{ asset('path') }}js/chartist.min.js"></script> --}}

	<!--  Notifications Plugin    -->
	<script src="{{ asset('js/bootstrap-notify.js') }}"></script>

	<!--  Google Maps Plugin    -->
	{{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> --}}

	<!-- Material Dashboard javascript methods -->
	<script src="{{ asset('js/material-dashboard.js') }}"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	{{-- <script src="{{ asset('path') }}js/demo.js"></script> --}}

	{{-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> --}}
    @stack("script")

</html>
