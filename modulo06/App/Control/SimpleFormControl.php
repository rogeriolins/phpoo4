<?php

use Livro\Control\Page;
use Livro\Widgets\Form\SimpleForm;

class SimpleFormControl extends Page
{

    public function __construct()
    {
        parent::__construct();
        $form = new SimpleForm('my_form');
        $form->setTitle('Titulo do Formulario Personalizado com Bootstrap');
        $form->addField('Nome', 'name', 'text', 'Maria', 'form-control');
        $form->addField('Endereço', 'endereco', 'text', 'Rua das Flores', 'form-control');
        $form->addField('Telefone', 'telefone', 'text', '(45) 3025-7565', 'form-control');
        $form->setAction('index.php?class=SimpleFormControl&method=onGravar');
        $form->show();
    }

    public function onGravar($param)
    {
        print "<pre>";
        print_r($param);
        print "</pre>";
    }

}
