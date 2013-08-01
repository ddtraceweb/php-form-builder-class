<?php
namespace PFBC\Validation;

use PFBC\Validation;

class Numeric extends Validation
{
    protected $message = "Error: %element% must be numeric.";

    public function isValid($value)
    {
        if ($this->isNotApplicable($value) || is_numeric($value)) {
            return true;
        }

        return false;
    }
}
