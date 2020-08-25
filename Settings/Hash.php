<?php

namespace Settings;

class Hash {
    /**
     * Create hashed 
     * @param $data
     * @return $hashed
     */
    public static function make(string $data)
    {
        $hashed = hash('sha256', $data);

        return $hashed;
    }

    /**
     * Make unique hash
     * @param void
     * @return $hashed
     */
    public static function unique(){
        $hashed = self::make(uniqid());

        return $hashed;
    }

    public static function salt($length){
		return md5(random_bytes($length));
		//return mcrypt_create_iv($length);
	}
}