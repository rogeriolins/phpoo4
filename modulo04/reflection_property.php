<?php

require_once 'classes/veiculo.php';

$rp = new ReflectionProperty('Automovel', 'placa');

print "<pre>";
print $rp->getName();

print "<br>isPrivate(): ";
    var_dump($rp->isPrivate());
print "<br>isStatic(): ";
    var_dump($rp->isStatic());
print "<br>isDefault(): ";
var_dump($rp->isDefault());
