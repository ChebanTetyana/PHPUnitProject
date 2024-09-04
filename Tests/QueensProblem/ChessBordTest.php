<?php

namespace Cheba\PhpUnit\Tests\QueensProblem;

use Cheba\PhpUnit\QueensProblem\ChessBoard;
use PHPUnit\Framework\TestCase;

class ChessBordTest extends TestCase
{
    public function testSolveReturnsCorrectSolution()
    {
        $board = new ChessBoard();
        $this->assertTrue($board->solve(), "Failed to find a solution");

        $solution = $board->getSolution();
        $this->assertCount(8, $solution, "Solution does not have 8 elements");

        for ($i = 0; $i < 8; $i++) {
            for ($j = $i + 1; $j < 8; $j++) {
                $this->assertNotEquals($solution[$i], $solution[$j], "Queens are on the same row");
                $this->assertNotEquals( abs($solution[$i] - $solution[$j]), abs($i - $j), "Queens are on the same diagonal");
            }
        }
    }
}