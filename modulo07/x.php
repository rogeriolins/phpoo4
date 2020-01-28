<?php

    $this->form = new FormWrapper(new Form('form_contato'));
    $this->form-setTitle('Formulário de contato');

    $nome     = new Entry('nome');
    $email    = new Entry('email');
    $assunto  = new Combo('assunto');
    $mensagem = new Text('mensagem');

/*
    $mensagem->setProperty('class', 'ClassePreDefinida');
    $mensagem->setProperty('style', 'font-weight: bold;');
*/

    $mensagem->class = 'ClassePreDefinida';
    $mensagem->style = 'font-weight: bold;';

    $this->form->addField('Nome', $nome, 300);
    $this->form->addField('E-mail', $email, 300);
    $this->form->addField('Assunto', $assunto, 300);
    $this->form->addField('Mensagem', $mensagem, 300);

    $this->form-addAction('Enviar', new Action(array($this, 'onSend')));

    $data = new stdClass;
    $data->email = "email@teste.com.br";
    $data->nome  = "Fulano de Tal";
    $this->form-setData($data);

    $this->form->getData();
    print $data->nome;
    print $data->email;

