<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Example\Game;

class GameTest {

    public function testShouldReturnSameNumber()
    {
        $game = new Game();
        $game->setValues([1]);
        $result = $game->play();

        $this->assertEquals([1], $result);
    }

    public function testWhenValueIs3ShouldReturnFizz()
    {
        $game = new Game();
        $game->setValues([3]);
        $result = $game->play();

	$this->assertEquals(['Fizz'], $result);
    }

    public function testWhenValueIs5ShouldReturnBuzz(){
	$game = new Game();
	$game->setValues([5]);
  $result = $game->play();

	$this->assertEquals(['Buzz'], $result);
    }

    public function testWhenValueIs3And5ShouldReturnFizzBuzz(){
        $game = new Game();
	      $values = [];
	      $values = range(1,15);
	      $game->setValues($values);
	      $result = $game->play();


      $expeted = [
        1, 2,
        'Fizz',
        4, 'Buzz',
        'Fizz', 7,
        8, 'Fizz',
        'Buzz', 11,
        'Fizz', 13,
        14, 'Buzz Fizz'
      ];

	    $this->assertEquals($expeted, $result);
    }
}
