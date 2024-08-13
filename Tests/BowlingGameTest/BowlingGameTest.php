<?php

namespace Cheba\PhpUnit\Tests\BowlingGameTest;

use Cheba\PhpUnit\BowlingGame\BowlingGame;
use PHPUnit\Framework\TestCase;

class BowlingGameTest extends TestCase
{
    public function testRollStrike()
    {
        $game = new BowlingGame();
        $pinsHit = $game->roll(10);

        $this->assertEquals(10, $pinsHit);
    }

    public function testRollSpare()
    {
        $game = new BowlingGame();
        $game->roll(7);
        $secondRoll = $game->roll(3);

        $this->assertEquals(3, $secondRoll);
        $this->assertEquals(10, $game->print());
    }

    public function testRoll()
    {
        $game = new BowlingGame();
        $game->roll(3);
        $game->roll(6);
        $this->assertEquals(9, $game->print());
    }

    public function testGameOver()
    {
        $game = new BowlingGame();
        for ($i = 0; $i < 20; $i++) {
            $game->roll(1);
        }
        $this->assertEquals("Game over!", $game->roll(1));
    }

    public function testFinalScore()
    {
        $game = new BowlingGame();
        for ($i = 0; $i < 12; $i++) {
            $game->roll(10);
        }
        $this->assertEquals(320, $game->print());
    }
}