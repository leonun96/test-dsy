<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inicio</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
	<header>
	  <!-- Navbar -->
	  <nav class="navbar navbar-expand-lg navbar-light bg-white">
		<div class="container-fluid">
		  <button
			class="navbar-toggler"
			type="button"
			data-mdb-toggle="collapse"
			data-mdb-target="#navbarExample01"
			aria-controls="navbarExample01"
			aria-expanded="false"
			aria-label="Toggle navigation"
		  >
			<i class="fas fa-bars"></i>
		  </button>
		  {{-- <div class="collapse navbar-collapse" id="navbarExample01">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			  <li class="nav-item active">
				<a class="nav-link" aria-current="page" href="#">Home</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Features</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Pricing</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">About</a>
			  </li>
			</ul>
		  </div> --}}
		</div>
	  </nav>
	  <!-- Navbar -->

	  <!-- Jumbotron -->
	  <div class="p-5 text-center bg-light">
		<h1 class="mb-3">Consultar precios del dolar</h1>
		<h4 class="mb-3">Selecciona mes y año</h4>
		{{-- <a class="btn btn-primary" href="" role="button">Call to action</a> --}}
	  </div>
	  <!-- Jumbotron -->
	</header>
	<div class="container">
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form method="post" action="{{ route('search') }}">
			@csrf
			<div class="input-group">
				<input class="form-control" type="number" name="ano" min="1990" max="2022" step="1" value="{{ date('Y') }}" />
				<select class="form-control" name="mes">
					<option value="01">Enero</option>
					<option value="02">Febrero</option>
					<option value="03">Marzo</option>
					<option value="04">Abril</option>
					<option value="05">Mayo</option>
					<option value="06">Junio</option>
					<option value="07">Julio</option>
					<option value="08">Agosto</option>
					<option value="09">Septiembre</option>
					<option value="10">Octubre</option>
					<option value="11">Noviembre</option>
					<option value="12">Diciembre</option>
				</select>
			</div>
			<div class="mt-2">
				<button class="btn btn-primary" type="submit">Consultar</button>
				<input type="submit" class="btn btn-success" name="print" value="Imprimir">
			</div>
		</form>
	</div>
</body>
</html>