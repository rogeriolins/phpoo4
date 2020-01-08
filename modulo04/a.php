<?php

namespace Application;

class Form
{
    public function __construct()
    {
        print "<br>...Instanciado a classe <b>".get_class($this)."</b> do namespace <b>Application</b>...<br>";
        print "<br>";
        var_dump($this);
        print "<hr>";
    }
}

class Field
{
    public function __construct()
    {
        print "<br>...Instanciado a classe <b>Field()</b> do namespace <b>Application</b>...<br>";
        print "<br>";
        var_dump($this);
        print "<hr>";
    }
}