<?php

use Livro\Control\Page;
use Livro\Control\Action;
use Livro\Widgets\Dialog\Question;

class ExemploQuestionControl extends Page
{

    public function __construct()
    {
        parent::__construct();
        $act1 = new Action([$this, 'onConfirma']);
        $act2 = new Action([$this, 'onNega']);
        new Question('Você deseja confirmar?', $act1, $act2);
    }

    public function onConfirma() {
        print "Confirmou a ação!";
    }

    public function onNega() {
        print "Negou a ação!";
    }

}