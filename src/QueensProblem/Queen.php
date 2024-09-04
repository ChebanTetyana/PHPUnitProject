<?php

namespace Cheba\PhpUnit\QueensProblem;

class Queen
{
    public int $row;
    public int $col;

    public function __construct($row, $col)
    {
        $this->row = $row;
        $this->col = $col;
    }

    public function isConflict($otherQueen): bool
    {
        return $this->row == $otherQueen->row ||
            $this->col == $otherQueen->col ||
            abs($this->row - $otherQueen->row) == abs($this->col - $otherQueen->col);
    }
}