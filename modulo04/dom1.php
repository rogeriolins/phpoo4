<?php

 $doc = new DOMDocument();
 $doc->load('bases.xml');

 print "<pre>";
 //print_r($doc);
 //var_dump($doc);
 //print "<hr>";

 $bases = $doc->getElementsByTagName('base');

 foreach ($bases as $base) {
     print "ID: " . $base->getAttribute('id') . "<br>";

     $name  = $base->getElementsByTagName('name');
     $host  = $base->getElementsByTagName('host');
     $type  = $base->getElementsByTagName('type');
     $user  = $base->getElementsByTagName('user');

     // print_r($name);

     print "Name: " . $name->item(0)->nodeValue . "<br>";
     print "Host: " . $host->item(0)->nodeValue . "<br>";
     print "Type: " . $type->item(0)->nodeValue . "<br>";
     print "User: " . $user->item(0)->nodeValue . "<br>";
     print "<hr>";
 }

// var_dump( $base );
// print_r( $base );
// print "<hr>";