<?php

spl_autoload_register(["LibraryLoader", "loadClass"]);
spl_autoload_register(["ApplicationLoader", "loadClass"]);

class LibraryLoader
{
    public static function loadClass($class)
    {
        if ( file_exists("Lib/{$class}.php")){
            require_once "Lib/{$class}.php";
            return true;
        }
    }
}

class ApplicationLoader
{
    public static function loadClass($class)
    {
        if ( file_exists("App/{$class}.php")){
            require_once "App/{$class}.php";
            return true;
        }
    }
}

var_dump(new Pessoa());

var_dump(new LibTeste("Ulêlê..."));