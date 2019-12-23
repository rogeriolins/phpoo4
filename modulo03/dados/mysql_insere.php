<?php

$conn = mysqli_connect("127.0.0.1", "root", "", "livro");

mysqli_query($conn, "insert into famosos (codigo, nome) values (1,'Érico Veríssimo')");
mysqli_query($conn, "insert into famosos (codigo, nome) values (2,'John Lennon')");
mysqli_query($conn, "insert into famosos (codigo, nome) values (3,'Mahatma Gandhi')");
mysqli_query($conn, "insert into famosos (codigo, nome) values (4,'Ayrton Senna')");
mysqli_query($conn, "insert into famosos (codigo, nome) values (5,'Charlie Chaplin')");
mysqli_query($conn, "insert into famosos (codigo, nome) values (6,'Anita Garibaldi')");
mysqli_query($conn, "insert into famosos (codigo, nome) values (7,'Mário Quintana')");

mysqli_close($conn);
