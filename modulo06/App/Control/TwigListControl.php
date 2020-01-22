<?php

use Livro\Control\Page;

class TwigListControl extends Page
{

    public function __construct()
    {
        parent::__construct();

        $loader = new Twig_Loader_Filesystem('App/Resources');
        $twig   = new Twig_Environment($loader);
        $template = $twig->loadTemplate('list.html');

        $replaces = [];
        $replaces['titulo']  = 'Lista de pessoas';
        $replaces['pessoas'] = [
            [   'codigo'    => 1,
                'nome'      => "Anita Garibaldi",
                'endereco'  => "Rua Bento Gonçalvez"
            ],
            [   'codigo'    => 2,
                'nome'      => "Bento Gonçalvez",
                'endereco'  => "Rua Tal"
            ],
            [   'codigo'    => 3,
                'nome'      => "Giuseppe Garibaldi",
                'endereco'  => "Rua Tal Tambem"
            ],
            [   'codigo'    => 4,
                'nome'      => "Marjorie Estiano",
                'endereco'  => "Rua Outra Tal Mais uma vez"
            ]
        ];

        print $template->render($replaces);
    }

}