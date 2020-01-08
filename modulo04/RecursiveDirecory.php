<?php

$myPath = '/home/rogeriolins/project/phpoo4';
$directory = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($myPath,RecursiveDirectoryIterator::SKIP_DOTS));

print "<pre>";
foreach ($directory as $item)
{
    print (string) $item;
    print "<br>";
}