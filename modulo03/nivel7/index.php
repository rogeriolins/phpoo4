<?php

    /* metodo para carregamento de classes */
    spl_autoload_register( function($class) {
       if(file_exists( $class . '.php')) {
           require_once $class . '.php';
       }
    });

    $classe = isset($_REQUEST['class']) ? $_REQUEST['class'] : "PessoaList";
    $metodo = isset($_REQUEST['method']) ? $_REQUEST['method'] : null;

    if (class_exists($classe)){
        $pagina = new $classe($_REQUEST);
        if( !empty($metodo) and method_exists($classe, $metodo)) {
            $pagina->$metodo( $_REQUEST );
        }
        $pagina->show();
    }