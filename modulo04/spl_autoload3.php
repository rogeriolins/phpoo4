<?php

class ApplicationLoader
{
    public function register()
    {
        spl_autoload_register([$this, 'loadClass']);
    }

    public static function loadClass($class)
    {
        if ( file_exists("App/{$class}.php")){
            require_once "App/{$class}.php";
            return true;
        }
    }
}

$instancia = new ApplicationLoader;
$instancia->register();

new Pessoa('Aline Lins');