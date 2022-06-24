<?php


namespace KnightsGame\Classes;


class Player
{

    private string $name;
    private int $score;

    /**
     * @param string|null $name
     */
    public function __construct(string $name = null)
    {
        $this->name = $name ?? 'player_'.rand(100, 1e10);
    }

    /**
     * Get Player score
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * Set Player Score
     * @return void
     */
    public function setScore(int $newScore)
    {
        $this->score = $newScore;
    }

    /**
     * Get Player Name
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}
