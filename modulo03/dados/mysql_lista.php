<?php


$conn = mysqli_connect("127.0.0.1", "root", "", "livro");

$query = 'select codigo, nome from famosos';
$result = mysqli_query($conn, $query);

if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo $row['codigo'] . ' - ' . $row['nome'] . '<br>';
  }
}

mysqli_close($conn);
