<?php
namespace Settings;
class Token {
	public static function generate() {
        $token = Session::set('csrf_token', md5(uniqid()));
        return Session::get('csrf_token');
	}

	public static function check($token) {
		$tokenName = 'csrf_token';

		if(Session::exists($tokenName) && $token === Session::get($tokenName)) {
			Session::delete($tokenName);
			return true;
		}

		return false;

	}
}


?>