<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$users = User::orderBy('id','ASC')->get();

		return View::make('users.index')->with('users',$users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User;

		$user->name = Input::get('name');
		$user->lastname = Input::get('lastname');
		$user->cc = Input::get('cc');
		$user->pass = Input::get('password');

		if($user->save()){
			Session::flash('message','Se ha guardado el usuario correctamente');
			Session::flash('class','success');
		}else{
			Session::flash('message','Ha ocurrido un error');
			Session::flash('class','danger');
		}

		return Redirect::to('users/create');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id)
	{
		$user = User::find($id);

		return View::make('users.show')->with('user',$user);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		$user = User::find($id);

		return View::make('users.edit')->with('user',$user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);

		$user->name = Input::get('name');
		$user->lastname = Input::get('lastname');
		$user->cc = Input::get('cc');
		$user->pass = Input::get('password');

		if($user->save()){
			Session::flash('message','Se ha actualizado el usuario correctamente');
			Session::flash('class','success');
		}else{
			Session::flash('message','Ha ocurrido un error');
			Session::flash('class','danger');
		}

		return Redirect::to('users');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);

		if($user->delete()){
			Session::flash('message','Se ha eliminado el usuario correctamente');
			Session::flash('class','success');
		}else{
			Session::flash('message','Ha ocurrido un error');
			Session::flash('class','danger');
		}

		return Redirect::to('users');
	}

	public function showLogin()
    {
        // Verificamos que el usuario esté autenticado
        if (Auth::check())
        {
            // Si está autenticado lo mandamos a la raíz donde estara el mensaje de bienvenida.
            return Redirect::to('/');
        }
        // Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
        return View::make('login');
    }

	public function postLogin()
	{
        // Guardamos en un arreglo los datos del usuario.
        $user = array(
            'cc' => Input::get('cc'),
            'pass'=> Input::get('pass')
        );
        // Validamos los datos y además mandamos como un segundo parámetro la opción de recordar el usuario.
        if(Auth::attempt($user))
        {
            // De ser datos válidos nos mandara a la bienvenida
            return Redirect::to('/');
        }
        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
        Session::flash('message','Tus datos son incorrectos');
		Session::flash('class','danger');
        return Redirect::to('login');
    }

	public function logOut()
    {
        Auth::logout();
        Session::flash('message','Se ha cerrado sesión correctamente');
		Session::flash('class','success');
        return Redirect::to('login');
    }
}
