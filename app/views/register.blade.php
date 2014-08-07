<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Prueba 2</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

	<style>
		body {
			width: 450px;
			margin: 50px auto;
		}
		.badge {
			float: right;
		}
	</style>
</head>
<body>
	<h1>Prueba</h1>
	
	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Nuevo usuario</h4>
  		</div>

  		<div class="panel-body">
  			<form method="post" action="{{url('store')}}">
				<p>
					<input type="text" name="name" placeholder="Nombre" class="form-control" required>
				</p>
				<p>
					<input type="text" name="lastname" placeholder="Apellidos" class="form-control" required>
				</p>
				<p>
					<input type="text" name="username" placeholder="Nombre de usuario" class="form-control" required>
				</p>
			    <!-- Password-->
			    <div class="controls">
			      <input type="password" name="password" placeholder="Contraseña" class="form-control" required>
			      <p class="help-block">Password should be at least 4 characters</p>
			    </div>
				<p>
					<input type="submit" value="Registrar" class="btn btn-success">
					<a href="{{url('login')}}" class="btn btn-default">Regresar</a>
				</p>
			</form>
		</div>
	</div>

	@if(Session::has('message'))
		<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
</body>
</html>