<?php

namespace Cheba\PhpUnit\WorldCup;

class Game
{
    public $homeTeam;
    public $awayTeam;
    public $homeScore = 0;
    public $awayScore = 0;
    public $addedAt;

    public function __construct($homeTeam, $awayTeam)
    {
        $this->homeTeam = $homeTeam;
        $this->awayTeam = $awayTeam;
        $this->addedAt = time();

    }

    public function getTotalScore(): int
    {
        return $this->homeScore + $this->awayScore;
    }

}
