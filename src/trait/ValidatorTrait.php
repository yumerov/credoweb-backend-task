<?php

namespace Yumerov\CredowebBackendTask\Trait;
use Symfony\Component\Validator\Validator\ValidatorInterface;

trait ValidatorTrait
{
    protected ValidatorInterface $validator;

    public function setValidator(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @todo: Create dedicared class for the result
     */
    public function validate($request): ?array
    {
        $errors = $this->validator->validate($request); 

        if ($errors->count() === 0) {
            return null;
        }

        return [$errors[0]->getPropertyPath() => $errors[0]->getMessage()];
    }
}