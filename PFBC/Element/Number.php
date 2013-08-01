<?php
namespace PFBC\Element;

use PFBC\Validation\Numeric;

class Number extends Textbox
{
    protected $_attributes = array("type" => "number");

    public function render()
    {
        $this->validation[] = new Numeric();
        parent::render();
    }
}
