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
  			<h4>Please Sign In</h4>
  		</div>

  		<div class="panel-body">
  			<form method="post" action="{{url('login')}}" class="form-signin" role="form">
	        <input type="text" class="form-control" name="username" placeholder="Nombre de usuario" required>
	        <input type="password" class="form-control" name="pass" placeholder="Contraseña" required>
	        <div class="checkbox">
	          <label>
	            <input type="checkbox" name="remember-me" value="remember-me"> Remember me
	          </label>
	        </div>
	        <input type="submit" class="btn btn-lg btn-primary" value="Sign In">
	        <a href="{{url('register')}}" class="btn btn-lg btn-success">Sign Up</a>
	      </form>
		</div>
	</div>

	@if(Session::has('message'))
		<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
</body>
</html>