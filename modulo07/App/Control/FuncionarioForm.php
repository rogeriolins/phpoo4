<?php

use Livro\Control\Page;
use Livro\Control\Action;
use Livro\Database\Transaction;
use Livro\Widgets\Dialog\Message;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Form\Entry;
use Livro\Widgets\Form\Combo;
use Livro\Widgets\Form\CheckGroup;
use Livro\Widgets\Form\RadioGroup;
use Livro\Widgets\Wrapper\FormWrapper;


class FuncionarioForm extends Page
{

    private $form;

    public function __construct()
    {
        parent::__construct();

        /* Construção do formulário */
        $this->form = new FormWrapper( new Form('form_funcionario') );
        $this->form->setTitle('Cadastro de funcionários');

        /* Definição dos campos */
        $id             = new Entry('id');
        $nome           = new Entry('nome');
        $endereco       = new Entry('endereco');
        $email          = new Entry('email');
        $departamento   = new Combo('departamento');
        $idiomas        = new CheckGroup('idiomas');
        $contratacao    = new RadioGroup('contratacao');

        /* Adição dos campos ao Formulário */
        $id->setEditable(false);
        $this->form->addField('Código',       $id);
        $this->form->addField('Nome',         $nome);
        $this->form->addField('Endereço',     $endereco);
        $this->form->addField('Email',        $email);
        $this->form->addField('Departamento', $departamento);
        $this->form->addField('Idiomas',      $idiomas);
        $this->form->addField('Contratação',  $contratacao);

        /* Campo Radio */
        $departamento->addItems( ['1' => 'RH',
                                  '2' => 'Atendimento',
                                  '3' => 'Engenharia',
                                  '4' => 'Produção' ] );
        $idiomas->addItems([ '1' => 'Inglês',
                             '2' => 'Espanhol',
                             '3' => 'Alemão',
                             '4' => 'Italiano' ]);
        $contratacao->addItems( [ '1' => 'Estagiário',
                                  '2' => 'PJ',
                                  '3' => 'CLT',
                                  '4' => 'Sócio'] );

        /* Ações */
        $this->form->addAction('Salvar', new Action([$this, 'onSave']));
        $this->form->addAction('Limpar', new Action([$this, 'onClear']));

        parent::add($this->form);

    }

    /* Editar */
    public function onEdit($param) {
        try
        {
            Transaction::open('livro');

            $id = isset($param['id']) ? $param['id'] : null;
            $funcionario = Funcionario::find($param['id']);
            if($funcionario)
            {
                if(isset($funcionario->idiomas))
                {
                    $funcionario->idiomas = explode(',', $funcionario->idiomas);
                }
                $this->form->setData($funcionario);
            }

            Transaction::close();
        }
        Catch (Exception $e)
        {
            new Message('error', $e->getMessage());
        }
    }

    /* Ação Salvar */
    public function onSave() {
        /* Controle de Excessão */
        try
        {
            Transaction::open('livro');
            $data = $this->form->getData();

            /* Validações */
            if(empty($data->nome)){
                throw new Exception("É preciso informar um nome.");
            }

            $funcionario = new Funcionario;
            /* Converte o Array de dados para o objeto Funcionario */
            $funcionario->fromArray((array) $data);
            $funcionario->idiomas = implode(',', (array) $data->idiomas);
            /* Grava no banco */
            $funcionario->store();

            $data->id = $funcionario->id;
            $this->form->setData($data);

            new Message('info', 'Dados salvos com sucesso');

            Transaction::close();
        }
        Catch (Exception $e)
        {
            new Message('error', $e->getMessage());
            Transaction::rollback();
        }

    }

    /* Ação Limpar */
    public function onClear() {

    }

}