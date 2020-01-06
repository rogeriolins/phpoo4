<?php


class myFile
{

    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getContents()
    {
        return file_get_contents($this->path);
    }

    public function getExtension()
    {
        return pathinfo($this->path,PATHINFO_EXTENSION);
    }

    public function getFileName()
    {
        return basename($this->path);
    }

    public function getSize()
    {
        return filesize($this->path);
    }

}

$file = new myFile('file_info_sem_spl.php');
print "FileName: " . $file->getFileName() . "<hr>";
print "Extension: " . $file->getExtension() . "<hr>";
print "Size: " . $file->getSize() . "<hr>";
//print "Contents: <pre> " . $file->getContents() . "<hr>";