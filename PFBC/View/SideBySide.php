<?php
namespace PFBC\View;

use PFBC\Element\Button;
use PFBC\Element\Hidden;
use PFBC\Element\HTML;
use PFBC\Element;
use PFBC\View;

class SideBySide extends View
{
    protected $class = "form-horizontal";

    public function render()
    {
        $this->_form->appendAttribute("class", $this->class);

        echo '<form', $this->_form->getAttributes(), '><fieldset>';
        $this->_form->getErrorView()->render();

        $elements     = $this->_form->getElements();
        $elementSize  = sizeof($elements);
        $elementCount = 0;
        for ($e = 0; $e < $elementSize; ++$e) {
            $element = $elements[$e];

            if ($element instanceof Hidden || $element instanceof HTML) {
                $element->render();
            } elseif ($element instanceof Button) {
                if ($e == 0 || !$elements[($e - 1)] instanceof Button) {
                    echo '<div class="form-actions">';
                } else {
                    echo ' ';
                }

                $element->render();

                if (($e + 1) == $elementSize || !$elements[($e + 1)] instanceof Button) {
                    echo '</div>';
                }
            } else {
                echo '<div class="control-group" id="element_', $element->getAttribute('id'), '">', $this->renderLabel(
                    $element
                ), '<div class="controls">', $element->render(), $this->renderDescriptions($element), '</div></div>';
                ++$elementCount;
            }
        }

        echo '</fieldset></form>';
    }

    protected function renderLabel(Element $element)
    {
        $label = $element->getLabel();
        if (!empty($label)) {
            echo '<label class="control-label" for="', $element->getAttribute("id"), '">';
            if ($element->isRequired()) {
                echo '<span class="required">* </span>';
            }
            echo $label, '</label>';
        }
    }
}
