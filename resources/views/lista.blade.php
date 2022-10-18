<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Resultado</title>
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
		<div></div>
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
				<input class="form-control" type="number" name="ano" min="1990" max="2022" step="1" value="{{ $val['ano'] }}" />
				<select class="form-control" name="mes">
					<option value="01" @if($val['mes'] == "01") selected @endif>Enero</option>
					<option value="02" @if($val['mes'] == "02") selected @endif>Febrero</option>
					<option value="03" @if($val['mes'] == "03") selected @endif>Marzo</option>
					<option value="04" @if($val['mes'] == "04") selected @endif>Abril</option>
					<option value="05" @if($val['mes'] == "05") selected @endif>Mayo</option>
					<option value="06" @if($val['mes'] == "06") selected @endif>Junio</option>
					<option value="07" @if($val['mes'] == "07") selected @endif>Julio</option>
					<option value="08" @if($val['mes'] == "08") selected @endif>Agosto</option>
					<option value="09" @if($val['mes'] == "09") selected @endif>Septiembre</option>
					<option value="10" @if($val['mes'] == "10") selected @endif>Octubre</option>
					<option value="11" @if($val['mes'] == "11") selected @endif>Noviembre</option>
					<option value="12" @if($val['mes'] == "12") selected @endif>Diciembre</option>
				</select>
			</div>
			<div class="{{-- d-grid gap-2 --}} mt-2">
				<button type="submit" class="btn btn-primary">Consultar</button>
				<a class="btn btn-info" href="{{ route('index') }}">Volver</a>
			</div>
		</form>
		<table class="table table-responsive">
			<thead>
				<th>Fecha</th>
				<th>Valor</th>
			</thead>
			<tbody>
				@foreach($collection['Dolares'] as $dolar)
				<tr>
					<td>{{ date('d-m-Y', strtotime($dolar['Fecha'])) }}</td>
					<td>${{ $dolar['Valor'] }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>