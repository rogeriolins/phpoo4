<?php

    namespace Library\Widgets;

    use Library\Container\Table;

    class Form
    {
        public function __construct()
        {
            print "<br>...Nova Instancia da Classe <b>".get_class($this)."</b> - <b>classe Form()</b>...<br>";
            print "<hr>";
        }

        public function fazAlgo(Field $x)
        {
            print "<br>...Metodo fazAlgo da Instancia de Classe <b>".get_class($this)."</b> que recebe um parametro de classe Field...<br>";
            var_dump($x);
            print "<hr>";
        }

        public function show()
        {
            new Table;
            new \SplFileInfo("/etc/shadow");
            print "<hr>";
        }
    }