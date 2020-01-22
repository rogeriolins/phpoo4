<?php

use \Livro\Control\Page;
use \Livro\Database\Transaction;
use \Livro\Database\Repository;
use \Livro\Database\Criteria;

class CidadeControl extends Page
{

    public function Listar()
    {
        try
        {
            Transaction::open('livro');

            $criteria = new Criteria();
            $criteria->setProperty('order', 'id');

            $repository = new Repository('Cidade');
            $cidades = $repository->load($criteria);

            if($cidades)
            {
                foreach ($cidades as $cidade) {
                    print "{$cidade->id} - {$cidade->nome}<br>";
                }
            }

            Transaction::close();
        }
        Catch (Exception $e)
        {
            Transaction::rollback();
            print $e->getMessage();
        }
    }

}