<?php


class LoggerTXT extends Logger
{

    public function write($messager)
    {
        $text = date("Y-m-d H:i:s") . ' : ' . $messager . "\n";
        $handler = fopen($this->filename, 'a');
        fwrite($handler, $text);
        fclose($handler);
    }

}