<?php

    $loader = require 'tmp/vendor/autoload.php';
    $loader->register();

    use PHPMailer\PHPMailer\PHPMailer;
    use CoffeeCode\Router\Router;

    print "<pre>";
    var_dump( new PHPMailer );
    var_dump( new Router('uol.com.br') );
