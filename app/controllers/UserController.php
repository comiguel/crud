<?php

class UserController extends BaseController {

	// public function __construct()
 //    {
 //        $this->beforeFilter('auth');
 //    }
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
		$user->username = Input::get('username');
		$user->pass = Hash::make(Input::get('password'));

		if($user->save()){
			Session::flash('message','Se ha guardado el usuario correctamente');
			Session::flash('class','success');
		}else{
			Session::flash('message','Ha ocurrido un error');
			Session::flash('class','danger');
		}

		return Redirect::to('login');

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
		$user->username = Input::get('username');
		$user->pass = Hash::make(Input::get('password'));

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
}
