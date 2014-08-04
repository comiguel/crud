<?php

class AuthController extends BaseController {


    public function showLogin()
    {
        
        if (Auth::check())
        {
            return Redirect::to('users');
        }
        return View::make('login');
    }

    public function showRegister()
    {
        return View::make('register');
    }

    	public function postLogin()
    	{
            $userdata = array('username' => Input::get('username'), 'password' => Input::get('pass'));
            
            if(Auth::attempt($userdata, Input::get('remember-me', 0)))
            {
                return Redirect::to('users');
            }
            Session::flash('message','Tus datos son incorrectos');
    		Session::flash('class','danger');
            return Redirect::to('/');
        }

    	public function logOut()
        {
            Auth::logout();
            Session::flash('message','Se ha cerrado sesión correctamente');
    		Session::flash('class','success');
            return Redirect::to('/');
        }
    }