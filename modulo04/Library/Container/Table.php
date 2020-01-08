<?php

namespace Library\Container;

class Table
{
    public function __construct()
    {
        print "<br>...Nova Instancia da Classe <b>".get_class($this)."</b> - <b>classe Table()</b>...<br>";
        print "<hr>";
    }
}