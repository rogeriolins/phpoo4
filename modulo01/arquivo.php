<?php

// $handler = fopen("C:\\xampp\\htdocs\\cursos\\phpoo4\\modulo01\\tmp\\tmp.txt", "r");

// while (!feof($handler)) {
//   print fgets($handler, 4096);
// }
// fclose($handler);
// echo "<hr>";
// echo "<pre>";
// var_dump($handler);
// echo "</pre>";


// $handler = fopen("C:\\xampp\\htdocs\\cursos\\phpoo4\\modulo01\\tmp\\tmp2.txt", "w");
// fwrite($handler, "linha1" . PHP_EOL);
// fwrite($handler, "linha2" . PHP_EOL);
// fwrite($handler, "linha3" . PHP_EOL);
// fclose($handler);

// $a = file_get_contents("C:\\xampp\\htdocs\\cursos\\phpoo4\\modulo01\\tmp\\tmp2.txt");
// echo $a;

// file_put_contents("C:\\xampp\\htdocs\\cursos\\phpoo4\\modulo01\\tmp\\tmp3.txt", "a\nb\nc\nc");

// $arqv = file("C:\\xampp\\htdocs\\cursos\\phpoo4\\modulo01\\tmp\\tmp3.txt");
// // echo "<br><br><br>";

// foreach ($arqv as $linha) {
//   print $linha . "<br>";
// }

/* COPIA ARQUIVOS */
copy("C:\\xampp\\htdocs\\cursos\\phpoo4\\modulo01\\tmp\\tmp3.txt", "C:\\xampp\\htdocs\\cursos\\phpoo4\\modulo01\\tmp\\tmp4.txt");

/* MOVER OU MUDAR DE NOME UM ARQUIVO */
rename("C:\\xampp\\htdocs\\cursos\\phpoo4\\modulo01\\tmp\\tmp4.txt", "C:\\xampp\\htdocs\\cursos\\phpoo4\\modulo01\\tmp\\tmp44.txt");

/* ELIMINAR UM ARQUIVO */
unlink("C:\\xampp\\htdocs\\cursos\\phpoo4\\modulo01\\tmp\\tmp44.txt");

/* ARQUIVO EXISTE */
if (file_exists("C:\\xampp\\htdocs\\cursos\\phpoo4\\modulo01\\tmp\\tmp3.txt")) {
  echo "Arquivo tmp3.txt existe";
} else {
  echo "Arquivo tmp3.txt não existe";
}

/* CRIAR DIRETORIO */
// mkdir("C:\\xampp\\htdocs\\cursos\\phpoo4\\modulo01\\tmp\\pasta1", 0777);

/* ELIMINAR DIRETORIO */
// rmdir("C:\\xampp\\htdocs\\cursos\\phpoo4\\modulo01\\tmp\\pasta1");

/* LISTA DIRETORIOS */
$FileUsers = scandir("C:\\xampp\\htdocs\\cursos\\phpoo4\\modulo01\\tmp\\");
foreach ($FileUsers as $files) {
  echo $files . "<br>";
}
