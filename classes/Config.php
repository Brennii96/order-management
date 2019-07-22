<?php

class Config
{
    /**
     * @param null $path
     * @return bool|mixed
     * Function to get Global parameters easily.
     */
    public static function get($path = null)
    {
        if ($path) {
            $config = $GLOBALS['config'];
            $path = explode('/', $config);

            foreach ($path as $bits) {
                if (isset($config[$bits])) {
                    $config = $config[$bits];
                }
            }
            return $config;
        }
        return false;
    }
}