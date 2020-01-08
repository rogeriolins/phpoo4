<?php
    require_once('classes/veiculo.php');

    $rc = new ReflectionClass('Automovel');

    print "<pre>";

    foreach ($rc->getMethods() as $method) {
        print "{$method->getName()}<br>";
        print_r($method->getParameters());
    }

    print "<hr>";
    print_r($rc->getMethods());
    print_r($rc->getProperties());
    print_r($rc->getParentClass());
    print "<hr>";

