<?php
namespace PFBC\Element;

use PFBC\Element;

class HTML extends Element
{
    public function __construct($value)
    {
        $properties = array("value" => $value);
        parent::__construct("", "", $properties);
    }

    public function render()
    {
        echo $this->_attributes["value"];
    }
}
