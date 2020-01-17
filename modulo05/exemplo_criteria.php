<?php

require_once "classes/api/Criteria.php";

$criterio = new Criteria;
$criterio->add('idade', '<', 16);
$criterio->add('idade', '>', 60, 'or');
$criterio->setProperty('order', 'id');
print $criterio->dump() . "<br>\n";


$criterio = new Criteria;
$criterio->add('idade', 'in', array(24,25,26));
$criterio->add('idade', 'not in', array(10));
print $criterio->dump() . "<br>\n";

