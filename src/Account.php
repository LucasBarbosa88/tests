<?php

namespace Example;

class Account
{
    private $balance;
    private $validator;
    private $logger;

    public function __construct($balance)
    {
        $this->balance = $balance;
    }

    public function setValidator($validator)
    {
        $this->validator = $validator;
    }

    public function setLogger($logger)
    {
        $this->logger =$logger;
    }

    public function withdraw($value)
    {
        if (!$this->validator->hasSufficientBalance($this, $value))
        {
            throw new \Exception('The account has not sufficient balance');
        }

        $this->balance -= $value;
        $this->logger->info("Transaction registred with value {$value}");

        return true;
    }
}
