<?php

require 'vendor/autoload.php';


use KnightsGame\Classes\CircularIterator;
use KnightsGame\Classes\Player;
use KnightsGame\Classes\Game;


$players = new CircularIterator([
    new Player("knight1"),
    new Player("knight2"),
    new Player("knight3"),
    new Player("knight4"),
    new Player("knight5"),
    new Player(),
]);


try {
    $game = new Game($players);
    $game->start();
} catch (Exception $e) {
    throw new Exception($e->getMessage());
}




