<?php

namespace Cheba\PhpUnit\BowlingGame;

class BowlingGame
{
    /** @var array<int[]> */
    private array $frames = [];

    /** @var int */
    private int $currentFrame = 1;

    /** @var bool */
    private bool $isFirstRoll = true;

    /** @var int */
    private int $bonusRolls = 0;

    public function __construct()
    {
    }

    public function roll(int $pinsHit): int|string
    {
        if ($this->currentFrame > 10) {
            return "Game over!";
        }

        if ($this->currentFrame <= 9 || $this->bonusRolls > 0) {
            if ($this->isFirstRoll) {
                if ($pinsHit == 10 && $this->currentFrame < 10) {
                    $this->frames[] = [10];
                    $this->currentFrame++;
                    $this->isFirstRoll = true;
                } else {
                    $this->frames[] = [$pinsHit];
                    $this->isFirstRoll = false;
                }
            } else {
                $this->frames[count($this->frames) - 1][] = $pinsHit;
                if ($this->frames[count($this->frames) - 1][0] + $pinsHit == 10) {
                    $this->frames[count($this->frames) - 1][] = 'Spare';
                }
                $this->currentFrame++;
                $this->isFirstRoll = true;
            }
        } else {
            if ($this->isFirstRoll) {
                $this->frames[] = [$pinsHit];
                if ($pinsHit == 10) {
                    $this->bonusRolls = 2;
                } else {
                    $this->isFirstRoll = false;
                    $this->bonusRolls = 1;
                }
            } else {
                $this->frames[count($this->frames) - 1][] = $pinsHit;
                $this->bonusRolls--;
                if ($this->bonusRolls === 0) {
                    $this->currentFrame++;
                }
            }
        }

        if ($this->currentFrame > 10) {
            return "Game over!";
        }
        return $pinsHit;
    }

    public function print() :int
    {
        $totalScore = 0;

        for ($i = 0; $i < count($this->frames); $i++) {
            $frame = $this->frames[$i];
            $frameScore = array_sum(array_filter($frame, fn($val) => is_numeric($val)));

            if (count($frame) == 1 && $frame[0] == 10) {
                $frameScore += $this->getStrikeBonus($i);
            } elseif (count($frame) == 3 && $frame[2] == 'Spare') {
                $frameScore += $this->getSpareBonus($i);
            }
            $totalScore += $frameScore;
        }
        return $totalScore;
    }

    private function getStrikeBonus($frameIndex): int
    {
        $bonus = 0;
        if (isset($this->frames[$frameIndex + 1])) {
            $nextFrame = $this->frames[$frameIndex + 1];
            $bonus += $nextFrame[0];
            if (isset($nextFrame[1])) {
                $bonus += $nextFrame[1];
            } elseif (isset($this->frames[$frameIndex + 2])) {
                $bonus += $this->frames[$frameIndex + 2][0];
            }
        }
        return $bonus;
    }

    private function getSpareBonus($frameIndex): int
    {
        return $this->frames[$frameIndex + 1][0] ?? 0;
    }
}
