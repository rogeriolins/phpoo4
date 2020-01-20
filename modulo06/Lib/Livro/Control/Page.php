<?php

namespace Livro\Control;

class Page
{
    public function show()
    {
        /* Valida os parametros enviados */
        if ( $_GET)
        {
            $method = isset($_GET['method']) ? $_GET['method'] : null;

            if (method_exists($this, $method))
            {
                call_user_func([$this, $method], $_REQUEST);
            }


        }
    }
}
