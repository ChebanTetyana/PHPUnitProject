<?php

namespace Cheba\PhpUnit\QueensProblem;

class ChessBoard
{
    private int $size;
    private array $queens;

    public function __construct($size = 8)
    {
        $this->size = $size;
        $this->queens = [];
    }

    public function placeQueen($row, $col): bool
    {
        $newQueen = new Queen($row, $col);

        foreach ($this->queens as $queen) {
            if ($newQueen->isConflict($queen)) {
                return false;
            }
        }

        $this->queens[] = $newQueen;
        return true;
    }

    public function removeQueen(): void
    {
        array_pop($this->queens);
    }

    public function solve($col = 0): bool
    {
        if ($col == $this->size) {
            return true;
        }

        for ($row = 1; $row <= $this->size; $row++) {
            if ($this->placeQueen($row, $col)) {
                if($this->solve($col + 1)) {
                    return true;
                }
                $this->removeQueen();
            }
        }

        return false;
    }

    public function getSolution(): array
    {
        $solution = array_fill(0, $this->size, 0);
        foreach ($this->queens as $queen) {
            $solution[$queen->col] = $queen->row;
        }
        return $solution;
    }
}