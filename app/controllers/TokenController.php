<?php

class TokenController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /token
	 *
	 * @return Response
	 */
	public function index()
	{
		$status = [ 
			'0' => 'Not Used',
			 '1' => 'Used Already'
		];
		$token = Token::all();
		return View::make('indexToken')
				->with('title', 'All Created Tokens')
				->with('tokens', $token)
				->with('status', $status);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /token/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$users = User::lists('name', 'id');
		return View::make('createToken')
				->with('title', 'Generate New Token')
				->with('users', $users);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /token
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [

					'amount'      => 'required|numeric',
					'url' => 'required|url',
					'user_id' => 'required',

			];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$amount = $data['amount'];

		for($count = 1; $count <= $amount; $count++) {
			
			$key = Token::generateUniqueRandom(); // generate a key

			$token = new Token();
			$token->token = $key;
			$token->link = $data['url'];
			$token->is_used = 0; // 0 means not used 1 means used already
			$token->user_id = $data['user_id'];
			$token->save();
			$flag = true;
		}


		if($flag){
			return Redirect::route('token.index')->with('success',"Token Generated Successfully");
		}else{
			return Redirect::route('token.index')->with('error',"Something went wrong.Try again");
		}
	
	}

	/**
	 * Display the specified resource.
	 * GET /token/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function check()
	{
		$rules = [

					'token'      => 'required'
				];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$token = $data['token'];

		if(Token::where('token', $token)->exists()) {
			$id = Token::where('token', $token)->pluck('id');
			if (Token::where('id', $id)->where('is_used', 0)->exists()) {
				 $url = Token::where('id', $id)->pluck('link');
				 $update_token = Token::find($id);
				 $update_token->is_used = 1;
				 $update_token->save();
				return Redirect::away("$url");
			} else {
				return Redirect::back()->withErrors('Token already used.Try another');
			}
		} else {
			return Redirect::back()->withErrors('Token mismatched.Please, try another');
		}


	
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /token/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /token/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /token/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user_id = Auth::user()->id;
		$affectedRows = Token::where('user_id', $user_id)->where('is_used', '=', 1)->delete();

		if($affectedRows) {
			return Redirect::route('token.index')->with('success',"Unused Deleted Successfully");
		}else{
			return Redirect::route('token.index')->with('error',"Something went wrong.Try again");
		}
	}

}