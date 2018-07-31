<?php

namespace TestAccount;

use PHPUnit\Framework\TestCase;
use Example\Account;
use Example\Validator;
use Example\Logger;

class AccountTest extends TestCase{

  /**
   * @expectedException \Exception
   * @expectedMessage ()
   */

  public function testNoHasSufficientBalance(){

    $account = new Account(10);
    $validator = $this->createMock(Validator::class);
    $validator->method('hasSufficientBalance')->willReturn(false);
    $account->setValidator($validator);

    $account->withdraw(20);
  }

  public function testHasSufficientBalance(){

    $account = new Account(10);
   
    $validator = $this->createMock(Validator::class);
    $validator->method('hasSufficientBalance')->willReturn(true);
    $account->setValidator($validator);

    $logger = $this->createMock(Logger::class);
    $logger->method('info')->willReturn(true);
    $account->setLogger($logger);
   
    $this->assertTrue($account->withdraw(20));
  }
}

?>
