<?php

$myFile2 = new SplFileObject('spl_file_object2.php');

while (!$myFile2->eof())
{
    print $myFile2->fgets();
}