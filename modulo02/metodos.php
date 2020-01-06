<?php

class Funcionario
{
  function setSalario()
  { }

  function getSalario()
  { }

  function setNome()
  { }
  function getNome()
  { }
}

print "<pre>";
print_r(get_class_methods("Funcionario"));
print "</pre>";
