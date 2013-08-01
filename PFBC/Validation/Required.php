<?php
namespace PFBC\Validation;

use PFBC\Validation;

class Required extends Validation
{
    protected $message = "Error: %element% is a required field.";

    public function isValid($value)
    {
        $valid = false;
        if (!is_null($value)) {
            if (is_array($value)) {
                if (!empty($value)) {
                    foreach ($value as $item) {
                        if ($item !== "") {
                            $valid = true;
                            break;
                        }
                    }
                }
            } elseif ($value !== "") {
                $valid = true;
            }
        }

        return $valid;
    }
}
