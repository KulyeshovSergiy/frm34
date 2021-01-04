<?php
namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsCenzor extends Constraint
{
    public $message = 'The string "{{ string }}" contains an forbidden word.';
    public function getTargets()
    {
        return self::PROPERTY_CONSTRAINT;
    }
}