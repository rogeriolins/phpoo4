<?php

    print "<pre>";
    foreach (new DirectoryIterator('/home/rogeriolins/project/phpoo4/modulo04') as $file)
    {
        //print (string) $file;
        print "    Nome: <b>{$file->getFileName()}</b>";
        print "<br>Extensão: <b>{$file->getExtension()}</b>";
        print "<br> Tamanho: <b>{$file->getSize()}</b>";
        print "<hr>";
    }