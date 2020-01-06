<?php

$myDocumentXML = new DOMDocument('1.0', 'UTF-8');
$myDocumentXML->formatOutput = true;

$bases = $myDocumentXML->createElement('bases');
$base  = $myDocumentXML->createElement('base');
$bases->appendChild($base);

$atributo = $myDocumentXML->createAttribute('id');
$atributo->value = '1';
$base->appendChild($atributo);

$base->appendChild( $myDocumentXML->createElement('name', 'meuTeste'));
$base->appendChild( $myDocumentXML->createElement('host', '127.0.0.1'));
$base->appendChild( $myDocumentXML->createElement('type', 'firebird'));
$base->appendChild( $myDocumentXML->createElement('user', base64_encode('sysdba')));
$base->appendChild( $myDocumentXML->createElement('pass', base64_encode('masterkey')));

print $myDocumentXML->saveXML($bases);
//file_put_contents($myDocumentXML);

