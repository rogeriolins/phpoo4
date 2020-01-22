<?php

$form = new SimpleForm('my form');
$form->setTitle('Título');
$form->addField('Nome', 'name', 'text', 'Maria', 'form-control');
$form->addField('Endereço', 'endereco', 'text', 'Rua das flores', 'form-control');
$form->addField('Telefone', 'fone', 'text', '(51) 1234-5678', 'form-control');
$form->setAction('index.php?class=SimpleFormControl&method=onGravar');
$form->show();

