<?php
namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Doctrine\Common\Persistence\ObjectManager;

class ContainsCenzorValidator extends ConstraintValidator
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof ContainsCenzor) {
            throw new UnexpectedTypeException($constraint, ContainsCenzor::class);
        }

        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) take care of that
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedTypeException($value, 'string');
        }

        $wlist=$this->manager->getRepository('AppBundle:CenzorWord')->findAll();

        foreach ($wlist as $item){
            if (preg_match('/'.$item->getCword().'/imu', $value, $matches)) {
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{ string }}', $value)
                    ->addViolation();
            }
        }




    }
}