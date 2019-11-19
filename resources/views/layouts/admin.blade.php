<!DOCTYPE html>
<html>
	<head>
	 	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Agence | CAOL</title>

		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
		<link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
		<link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
	 	<link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')}}">
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
	
		<header class="main-header">
			<a href="#" class="logo">
			  	<span class="logo-lg"><b>CAOL</b> | Agence</span>
			</a>
		<!-- Nav Principal-->
			<nav class="navbar navbar fixed-top">
				<div class="navbar-custom-menu">
				    <ul class="nav navbar-nav">
					    <li class="dropdown user user-menu">
					      	<a href="#"  class="dropdown-toggle">
					      		<span>Agence</span>
					      	</a>
					    </li>
					    <li class="dropdown user user-menu">
					      	<a href="#"  class="dropdown-toggle">
					      		<span>Projectos</span>
					      	</a>
					    </li>
					    <li class="dropdown user user-menu">
					      	<a href="#"  class="dropdown-toggle">
					      		<span>Administrativo</span>
					    	</a>
					    </li>
					    <li class="dropdown user user-menu">
					      	<a href="#"  class="dropdown-toggle">
					      		<span>Comercial</span>
					      	</a>
					    </li>
					    <li class="dropdown user user-menu">
					      	<a href="#"  class="dropdown-toggle">
					      		<span>Financiero</span>
					      	</a>
					    </li>
					    <li class="dropdown user user-menu">
					      	<a href="#"  class="dropdown-toggle">
					      		<span>Usuario</span>
					      	</a>
					    </li>
					    <li class="dropdown user user-menu">
					      	<a href="#"  class="dropdown-toggle">
					      		<span>Salir</span>
					      	</a>
					    </li>
				    </ul>
			  	</div>
			</nav>
		</header>
		<div class="container-fluid">
			<div class="row">
				@yield('contenido')	
			</div>
		</div>
	     <!-- footer-->
	<!-- Bootstrap 3.3.7 -->
		<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
	</body>
</html>
