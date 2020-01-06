<?php

class Software
{
  private $nome;
  private $id;
  private static $contador;

  public function __construct($nome)
  {
    self::$contador++;
    $this->id = self::$contador;
    $this->nome = $nome;
  }
}

$s1 = new Software("GIMP");
$s2 = new Software("Gnumeric");
$s3 = new Software("Nano");

print "<pre>";
var_dump($s1, $s2, $s3);
print "</pre>";
