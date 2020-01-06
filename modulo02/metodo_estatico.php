<?php

class Software
{
  private $nome;
  private $id;
  private static $contador = 0;

  public function __construct($nome)
  {
    self::$contador++;
    $this->id = self::$contador;
    $this->nome = $nome;
  }
  public static function getContador()
  {
    return self::$contador;
  }
}

print "<pre>";
var_dump(Software::getContador());

$s1 = new Software("GIMP");
$s2 = new Software("Gnumeric");
$s3 = new Software("Nano");

var_dump($s1, $s2, $s3);
var_dump(Software::getContador());
print "</pre>";
