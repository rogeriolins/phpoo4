<?php

/* Classe de negocio */
class Produto
{

    private $dataBase;

    public static function setConnection( PDO $conn )
    {
        ProdutoGateway::setConnection($conn);
    }

    /* Metodo magico GET */
    public function __get($prop)
    {
        return $this->dataBase[$prop];
    }

    /* Metodo magico SET */
    public function __set($prop, $value)
    {
        $this->dataBase[$prop] = $value;
    }

    public static function find($id)
    {
        $gateway = new ProdutoGateway;
        return $gateway->find($id, 'Produto');
    }

    public static function all($filter='')
    {
        $gateway = new ProdutoGateway;
        return $gateway->all($filter, 'Produto');
    }

    public function delete()
    {
        $gateway = new ProdutoGateway;
        return $gateway->delete($this->id);
    }

    public function save()
    {
        $gateway = new ProdutoGateway;
        return $gateway->save((object) $this->dataBase);
    }

    /* Metodo de negocio*/
    public function getMargemLucro()
    {
        return ( ($this->preco_venda - $this->preco_custo) / $this->preco_custo) * 100;
    }

    /* Metodo de negocios */
    public function registraCompra($custo, $quantidade)
    {
        $this->preco_custo = $custo;
        $this->estoque += $quantidade;
    }

    public function show($orientacao = 'V')
    {
        if($orientacao=='V') {
            print "<br>    
                           Codigo: <b>{$this->dataBase['id']}</b>
                        Descricao: <b><u>{$this->dataBase['descricao']}</u></b>
                          Estoque: <b>{$this->dataBase['estoque']}</b>
                   Preço de Custo: <b>{$this->dataBase['preco_custo']}</b>
                   Preço de Venda: <b>{$this->dataBase['preco_venda']}</b>
                 Codigo de Barras: <b>{$this->dataBase['codigo_barras']}</b>
                 Data de Cadastro: <b>{$this->dataBase['data_cadastro']}</b>
                Origem do Produto: <b>{$this->dataBase['origem']}</b><br>
                   ";
        } else {
            print "{$this->dataBase['id']}</b>  -  <b><u>{$this->dataBase['descricao']}</u></b> - <b>{$this->dataBase['estoque']}</b>  -  <b>{$this->dataBase['preco_custo']}</b> -  <b>{$this->dataBase['preco_venda']}</b>  -  <b>{$this->dataBase['codigo_barras']}</b>  -  <b>{$this->dataBase['data_cadastro']}</b>  -  <b>{$this->dataBase['origem']}</b><br>";
        }
    }

    public function __destruct()
    {
//        print "<pre>";
//        var_dump((object) $this->dataBase);
    }

}