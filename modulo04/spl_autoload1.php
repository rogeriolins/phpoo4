<?php

    spl_autoload_register( function ($class) {
        $fileClass = "App/{$class}.php";
        if(file_exists($fileClass)) {
            require_once($fileClass);
            return true;
        }
    });