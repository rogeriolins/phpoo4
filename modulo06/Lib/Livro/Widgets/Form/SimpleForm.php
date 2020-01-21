<?php

namespace Livro\Widgets\Form;

class SimpleForm
{
    private $name, $action, $fields, $title;

    public function __construct($name) {
        $this->name   = $name;
        $this->fields = [];
        $this->title  = '';
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function addField($label, $name, $type, $value='', $class='') {
        $this->fields[] = [
            'label' => $label,
            'name'  => $name,
            'type'  => $type,
            'value' => $value,
            'class' => $class
        ];
    }

    public function setAction($action) {
        $this->action = $action;
    }

    public function show()
    {
        print "<div class='panel panel-default' style='margin:40px;'>\n";
            print "<div class='panel-heading'>{$this->title}</div>\n";
            print "<div class='panel-body'>\n";
                print "<form method='post' action='{$this->action}' class='form-horizontal'>\n";
                if ($this->fields)
                {
                    foreach ($this->fields as $field)
                    {
                        print "<div class='form-group'>\n";
                            print "<label class='col-sm-2 control-label'> {$field['label']} </label>\n";
                            print "<div class='col-sm-10'>\n";
                                print "<input type='{$field['type']}' name='{$field['name']}' value='{$field['value']}' class='{$field['class']}'>\n";
                            print "</div>\n";
                        print "</div>\n";
                    }
                }

                print "<div class='form-group'>\n";
                    print "<div class='col-sm-offset-2 col-sm-8'>\n";
                        print "<input type='submit' class='btn btn-success' value='Enviar'>\n";
                    print "</div>\n";
                print "</div>\n";

                print "</form>";
            print "</div>\n";
        print "</div>\n";
    }
}
