<?php

use \Livro\Control\Page;

class TwigSampleControl extends Page
{

    public function __construct()
    {
        $loader   = new Twig_Loader_Filesystem('App/Resources');
        $twig     = new Twig_Environment($loader);
        $template = $twig->loadTemplate('form.html');

        $replaces = [];
        $replaces['title']    = "Titulo do form";
        $replaces['nome']     = "Maria das Flores";
        $replaces['endereco'] = "Rua da Maria das Flores";
        $replaces['telefone'] = "(45) 3025-7565";
        $replaces['action'] = "index.php?class=TwigSampleControl&method=onGravar";
        print $template->render( $replaces );
    }

    public function onGravar($params)
    {
        print "<pre>";
        var_dump($params);
        print "</pre>";
    }

}