<?php

use Livro\Control\Page;
use \Livro\Database\Transaction;
use \Livro\Database\Repository;
use \Livro\Database\Criteria;

class PessoaControl extends Page
{

    public function Listar()
    {
        try
        {
            Transaction::open('livro');
            $criteria = new Criteria();
            $criteria->setProperty('order', 'id');

            $repository = new Repository('Pessoa');
            $pessoas = $repository->load($criteria);
            if($pessoas)
            {
                foreach ($pessoas as $pessoa) {
                    print "{$pessoa->id} - {$pessoa->nome}<br>";
                }
            }


            Transaction::close();
        }
        catch (Exception $e)
        {
            Transaction::rollback();
            print $e->getMessage();
        }
    }

}