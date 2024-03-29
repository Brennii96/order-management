<?php

class Token
{
    /**
     * @return mixed
     */
    public static function generate()
    {
        return Session::put(Config::get('session/token_name'), base64_encode(openssl_random_pseudo_bytes(16)));
    }
    /**
     * @param $token
     * @return bool
     */
    public static function check($token)
    {
        $tokenName = Config::get('session/token_name');
        if (Session::exists($tokenName) && $token === Session::get($tokenName)) {
            Session::delete($tokenName);
            return true;
        }
        return false;
    }
}