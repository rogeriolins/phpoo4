<?php


namespace Livro\Widgets\Form;

use Livro\Widgets\Base\Element;

class Combo extends Field implements FormElementInterface
{
    /* array com os itens do combo */
    private   $items;
    protected $properties;

    public function addItems($items) {
        $this->items = $items;
    }

    public function show() {
        $tag = new Element('select');
        $tag->class = 'combo';
        $tag->name  = $this->name;
        $tag->style = "width: {$this->size}";

        $opt = new Element('option');
        $opt->add('');
        $opt->value = 0;

        $tag->add($opt);
        if($this->items)
        {
            foreach ($this->items as $chave => $item)
            {
                $opt = new Element('option');
                $opt->value = $chave;
                $opt->add($item);

                if($chave == $this->value) {
                  $opt->selected = 1;
                }

                $tag->add($opt);
            }
        }

        if(!parent::getEditable())
        {
            $tag->readonly = "1";
        }

        if ($this->properties)
        {
            foreach ($this->properties as $property => $value)
            {
                $tag->$property = $value;
            }
        }

        $tag->show();
    }
}

