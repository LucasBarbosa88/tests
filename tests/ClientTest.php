<?php

namespace TestClient;

use PHPUnit\Framework\TestCase;
use Example\Client;
use Example\Validator;

class CLientTest {

  /**
   * @expectedException \Exception
   * @expectedMessage Mathias
   */
  public function testCpfIsInvalid()
  {
      $client = new Client('xxx');
      $validator =  $this->createMock(Validator::class);
      $validator->method('isCPFValid')->willReturn(false);
      $client->setValidator($validator);

      $client->create();
  }

  public function testCpfIsValid()
  {
      $client = new Client('xxx');

      $validator =  $this->createMock(Validator::class);
      $validator->method('isCPFValid')->willReturn(true);

      $client->setValidator($validator);
      $this->assertTrue($client->create());

  }
}

?>
