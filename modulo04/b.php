<?php

namespace Components;

class Form
{
    public function __construct()
    {
        print "<br>...Instanciado a classe <b>Form()</b> do namespace <b>Components</b>...<br>";
        print "<br>";
        var_dump($this);
        print "<hr>";
    }
}

class Field
{
    public function __construct()
    {
        print "<br>...Instanciado a classe <b>Field()</b> do namespace <b>Components</b>...<br>";
        print "<br>";
        var_dump($this);
        print "<hr>";
    }
}