<?php

class AuthController extends \BaseController {

	public function login(){
		return View::make('auth.login')
					->with('title', 'Login');
	}

	public function doLogin()
	{
		$rules = array
		(
					'email'    => 'required',
					'password' => 'required'
		);
		$allInput = Input::all();
		$validation = Validator::make($allInput, $rules);

		//dd($allInput);


		if ($validation->fails())
		{

			return Redirect::route('login')
						->withInput()
						->withErrors($validation);
		} else
		{

			$credentials = array
			(
						'email'    => Input::get('email'),
						'password' => Input::get('password')
			);

			if (Auth::attempt($credentials))
			{
				return Redirect::intended('dashboard');
			} else
			{
				return Redirect::route('login')
							->withInput()
							->withErrors('Error in Email Address or Password.');
			}
		}
	}

	public function logout(){
		Auth::logout();
		return Redirect::route('login')
					->with('success',"You are successfully logged out.");
	}

	public function dashboard(){
		return View::make('dashboard')
					->with('title','Dashboard');
	}

	public function changePassword(){
		return View::make('auth.changePassword')
					->with('title',"Change Password");
	}

	public function doChangePassword(){
		$rules =[
			'password'              => 'required|confirmed',
			'password_confirmation' => 'required'
		];
		$data = Input::all();

		$validation = Validator::make($data,$rules);

		if($validation->fails()){
			return Redirect::back()->withErrors($validation)->withInput();
		}else{
			$user = Auth::user();
			$user->password = Hash::make($data['password']);

			if($user->save()){
				Auth::logout();
				return Redirect::route('login')
							->with('success','Your password changed successfully.');
			}else{
				return Redirect::route('dashboard')
							->with('error',"Something went wrong.Please Try again.");
			}
		}
	}

	public function index()  {
		$users = User::all();
		return View::make('allUser')
					->with('title', 'List of all Admin')
					->with('users', $users);
	}

	public function create()  {
		
		return View::make('add')
					->with('title', 'Add New Admin');
	}

	public function store()  {
		$rules = [

					'name'      => 'required',
					'email' => 'required|email',
					'password' => 'required',

			];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$user = new User();
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->password = Hash::make($data['password']);
		if($user->save()) {
			return Redirect::route('user.index')->with('success',"User Added Successfully & email: ".$data['email']." And Password: ".$data['password']);
		} else {
			return Redirect::route('user.index')->with('error',"Something went wrong.Try again");
		}
		
	}



}