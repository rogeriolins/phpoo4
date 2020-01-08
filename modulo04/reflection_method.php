<?php

require_once "classes/veiculo.php";
$rm = new ReflectionMethod('Automovel', 'setPlaca');

print "<pre>";
print $rm->getName() .  "<br>";
print "isPrivate(): ";
    var_dump($rm->isPrivate() );
print "isStatic(): ";
    var_dump($rm->isStatic() );
print "isFinal(): ";
    var_dump($rm->isFinal() );
print_r( $rm->getParameters() );
