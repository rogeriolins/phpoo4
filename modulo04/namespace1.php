<?php

namespace Application;
class Form
{

}

namespace Components;
class Form
{

}

print "<pre>";
var_dump( new Form );
print "<br>";

var_dump( new \Application\Form );
print "<br>";

var_dump( new \Components\Form );
print "<br>";

var_dump( new \SplFileInfo('/etc/shadow'));
print "<br>";

