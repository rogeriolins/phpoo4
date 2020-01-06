<?php

    $dir = opendir('/home/rogeriolins/project/phpoo4/modulo04');

    print "<pre>";
    while ($arquivo = readdir($dir))
    {
        if( $arquivo <> '.' or $arquivo <> '..') {
            print $arquivo . '<br>';
        }
    }
    closedir($dir);