<?php


namespace KnightsGame\Classes;


class Game
{
    private CircularIterator $players;

    /**
     * @throws \Exception
     */
    public function __construct(CircularIterator $players)
    {
        for ($i = 0; $i < $players->count(); $i++) {
            if ($players[$i] instanceof Player) {
                $players[$i]->setScore(100);
            } else {
                print_r($players[$i]);
                throw new \Exception("Player is not valid!");
            }
        }

        $this->players = $players;
    }

    /**
     * Start Game
     * @return void
     */
    public function start()
    {
        echo "********** Game started **********" . PHP_EOL;
        echo "#Players Count: " . $this->players->count() . PHP_EOL;

        $round = 1;
        while ($this->players->count() > 1) {
            $currentPlayer = $this->players->current();
            $dice = rand(1, 6);
            echo "#Round: " . $round . " #Player: " . $currentPlayer->getName() . " #score:" . $currentPlayer->getScore() . " #dice: " . $dice . PHP_EOL;

            $this->players->next();
            $nextPlayer = $this->players->current();
            $nextPlayer->setScore($nextPlayer->getScore() - $dice);
            if ($nextPlayer->getScore() <= 0) {
                echo "***Looser: " . $nextPlayer->getName() . " #score:" . $nextPlayer->getScore() . PHP_EOL;
                $this->players->offsetUnset($this->players->key());
                $this->players->next();
            }

            $round++;
        }

        $winner = $this->players->current();

        echo "################################" . PHP_EOL;
        echo "Winner: " . $winner->getName() . " #score: " . $winner->getScore() . PHP_EOL;
        echo "################################" . PHP_EOL;
    }
}