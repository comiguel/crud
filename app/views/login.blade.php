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
  			<h4>Please sign in</h4>
  		</div>

  		<div class="panel-body">
  			<form class="form-signin" role="form">
	        <input type="email" class="form-control" placeholder="Número de cédula" required="" autofocus="">
	        <input type="password" class="form-control" placeholder="Password" required="">
	        <div class="checkbox">
	          <label>
	            <input type="checkbox" value="remember-me"> Remember me
	          </label>
	        </div>
	        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	      </form>
		</div>
	</div>

	@if(Session::has('message'))
		<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
</body>
</html>