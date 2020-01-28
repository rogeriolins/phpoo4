<?php

namespace Livro\Core;

/* Carrega as classes do framework */
class ClassLoader
{
    protected $prefixes = array();

    public function register()
    {
        spl_autoload_register( array($this,'loadClass') );
    }

    public function addNamespace($prefix, $base_dir, $prepend = false)
    {
        /* Normaliza os prefix do namespace*/
        $prefix = trim($prefix, '\\') . '\\';

        /* Normaliza o diretorio base com o separador */
        $base_dir = rtrim($base_dir, DIRECTORY_SEPARATOR) . '/';

        /* Inicializa o prefixo do namespace no array */
        if (isset($this->prefixes[$prefix]) ===false) {
            $this->prefixes[$prefix] = array();
        }

        /* Retain o diretorio base do prefixo do namespace */
        if($prepend)
        {
            array_unshift($this->prefixes[$prefix], $base_dir);
        } else {
            array_push($this->prefixes[$prefix], $base_dir);
        }
    }

    public function loadClass($class)
    {
        $prefix = $class;

        while(false !== $pos = strpos($prefix, '\\')){
            $prefix = substr($class, 0, $pos+1);
            $relative_class = substr($class, $pos+1);
            $mapped_file = $this->loadMappedFile($prefix, $relative_class);
            if($mapped_file) {
                return $mapped_file;
            }

            $prefix = rtrim($prefix, '\\');
        }
        return false;
    }

    protected function loadMappedFile($prefix, $relative_class)
    {
        if (isset($this->prefixes[$prefix])===false){
            return false;
        }

        foreach ($this->prefixes[$prefix] as $base_dir)
        {
            $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
        }

        if ($this->requireFile($file))
        {
            return $file;
        }
    }

    protected function requireFile($file)
    {
        if (file_exists($file))
        {
            require $file;
            return true;
        }
        return false;
    }
}