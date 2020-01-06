<?php

require_once "Record.php";
require_once "ProdutoTrait.php";

class Produto extends Record
{
    const TABLENAME = "produto";
    use ObjectCoversionTrait;
}