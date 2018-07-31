<?php

namespace Example;
use PHPUnit\Framework\TestCase;

class Client extends TestCase
{
    private $validator;
    private $cpf;

    public function __construct($cpf)
    {
        $this->cpf = $cpf;
    }

    public function setValidator($validator)
    {
        $this->validator = $validator;
    }

    public function create()
    {
        if (!$this->validator->isCPFValid($this->cpf))
        {
             throw new \Exception('Mathias');
        }

        return true;
    }
}
