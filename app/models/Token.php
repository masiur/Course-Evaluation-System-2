<?php

class Token extends \Eloquent {
	protected $guarded = ['id'];
	protected $table = 'tokens';

	public function user(){
		return $this->belongsTo('User', 'user_id', 'id');
	}


	// generate random string
	public static function quickRandom($length = 6)
	{
		$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		return substr(str_shuffle(str_repeat($pool, 2)), 0, $length);
	}
	/* could use str_random() but this code segment is customizatble . Happy Coding :) 
	*/

	// generate new user's reference code which will be used to refer others

	public static function generateUniqueRandom() {

    	$token = Token::quickRandom();

		if (Token::randomNumberExists($token)) {
		    return generateUniqueRandom();
		}

	    return $token;
	}
	// check if random exist then return boolean 
	public static function randomNumberExists($token) {

		return Token::where('token', $token)->exists();
	}
}