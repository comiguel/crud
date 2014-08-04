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
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
  			<div class="navbar-header">
				<a class="navbar-brand" href="#">Elecsis</a>
  			</div>
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
        			<li><a href="/users">Todos</a></li>
        			<li><a href="/users/create">Nuevo</a></li>
        		</ul>
        	</div>
        </div>
    </nav>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Editar usuario</h4>
  		</div>

  		<div class="panel-body">
        @if (!empty($user))
    			<form method="post" action="/users/update/{{ $user->id }}">
          <p>
            <input value="{{ $user->name }}" type="text" name="name" placeholder="Nombre" class="form-control" required>
          </p>
          <p>
            <input value="{{ $user->lastname }}" type="text" name="lastname" placeholder="Apellidos" class="form-control" required>
          </p>
          <p>
            <input value="{{ $user->cc }}" type="text" name="cc" placeholder="Cédula" class="form-control" required>
          </p>
          <div class="controls">
            <input type="password" name="password" placeholder="Password" class="form-control" required>
            <p class="help-block">Password should be at least 4 characters</p>
          </div>
          <input type="submit" value="Guardar" class="btn btn-success">
          @else
          <p>
            No existe información para éste usuario.
          </p>
          @endif
        <a href="/users" class="btn btn-default">Regresar</a>
      </form>
		</div>
	</div>

  @if(Session::has('message'))
    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
</body>
</html>