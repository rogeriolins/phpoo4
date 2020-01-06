<?php

$myFile = new SplFileInfo('spl_file_info.php');
print "FileName: {$myFile->getFileName()}<hr>";
print "Extension: {$myFile->getExtension()}<hr>";
print "Size: {$myFile->getSize()}<hr>";
print "Type: {$myFile->getType()}<hr>";
print "isWriteable: {$myFile->isWritable()}<hr>";
var_dump( $myFile->isWritable() );
//print "Contents: {$myFile->getContents()}";