<?php

$myFile = new SplFileObject('spl_file_object.php');
print "FileName: {$myFile->getFileName()}<hr>";
print "Extension: {$myFile->getExtension()}<hr>";
//print "Size: {$myFile->getSize()}<hr>";
//print "Type: {$myFile->getType()}<hr>";
//print "isWriteable: {$myFile->isWritable()}<hr>";
//var_dump( $myFile->isWritable() );
////print "Contents: {$myFile->getContents()}";
///


$file2 = new SplFileObject('novo.txt', 'w');
$bytes = $file2->fwrite("Hello People...");
print "Bytes: {$bytes}";