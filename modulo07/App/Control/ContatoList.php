<?php

use Livro\Control\Page;
use Livro\Control\Action;
use Livro\Widgets\Datagrid\Datagrid;
use Livro\Widgets\Datagrid\DatagridColumn;
use Livro\Widgets\Wrapper\DatagridWrapper;
use Livro\Widgets\Dialog\Message;

class ContatoList extends Page
{

    private $datagrid;

    public function __construct()
    {
        parent::__construct();
        $this->datagrid = new DatagridWrapper( new Datagrid );

        $codigo  = new DatagridColumn('id', 'Código', 'center', '10%');
        $nome    = new DatagridColumn('nome', 'Nome', 'left', '20%');
        $email   = new DatagridColumn('email', 'Email', 'left', '30%');
        $assunto = new DatagridColumn('assunto', 'Assunto', 'left', '30%');

        $this->datagrid->addColumn($codigo);
        $this->datagrid->addColumn($nome);
        $this->datagrid->addColumn($email);
        $this->datagrid->addColumn($assunto);

        $this->datagrid->addAction('visualizar', new Action([$this, 'onVisualiza']), 'nome');

        $nome->setTransformer(function($value){
            return strtolower($value);
        });

        parent::add($this->datagrid);
    }

    public function onVisualiza($param) {
        new Message('info', "Você clicou sobre o registro: {$param['nome']}");
    }

    public function onReload() {
        $this->datagrid->clear();
        $m1 = new stdClass;
        $m1->id = 1;
        $m1->nome = 'Maria do Socorro';
        $m1->email = 'msocorro@itaipu.gov.br';
        $m1->assunto = 'Minha primeira dúvda';
        $this->datagrid->addItem($m1);

        $m11 = new stdClass();
        $m11->id = 2;
        $m11->nome = 'Pedro Amancio de Souza';
        $m11->email = 'pamancios@itaipu.gov.br';
        $m11->assunto = 'Receber dividendos';
        $this->datagrid->addItem($m11);

        $m111 = new stdClass();
        $m111->id = 3;
        $m111->nome = 'Jaqueline Morales';
        $m111->email = 'jmoralez@itaipu.gov.br';
        $m111->assunto = 'Pgto Adiantado';
        $this->datagrid->addItem($m111);
    }

    public function show() {
        $this->onReload();
        parent::show();
    }

}