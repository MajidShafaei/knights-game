# Knights Game

## Rules of game
    • any number of knights in a circle
    • each knight has the same number of life points (e.g. 100)
    • the game runs in turn:
        • each player rolls a dice (d6); the number rolled is subtracted from the next player's life points
        • then it is the next player's turn
        • knight die if their life points <= 0
        • dead knights are removed from the field
    • the game is over when only one knight is left on the field


## Output
    the knight, who won the game

# Run game

```bash
git clone git@github.com:MajidShafaei/knights-game.git
composer install
php src/index.php
```