<?php

use Puzzle\WordScramble;

require 'WordScramble.php';

class EscapeRoomSimulator
{
    function play()
    {
        echo "\n### ESCAPE ROOM SIMULATOR ###\n";
        while (true) {
            echo "\nWhat do you want to do?\n1. Look around\n2. Open the box\n3. Solve the puzzle\n4. Open the door\n5. Quit\n";
            $option = readline("Enter your choice: ");
            if ($option == 1) {
                echo "\nThere is a locked box and a door.\n";
            } elseif ($option == 2) {
                echo "\nYou need to solve the puzzle in the box to open the door.\n";
            } elseif ($option == 3) {
                $word = new \Puzzle\WordScramble;
                echo "\nSolve this word scramble:\n";
                if ($word->guessWord()) {
                    echo "\nNow you can go out.\n";
                } else {
                    echo "\nGame over. You're trapped!";
                    exit;
                }
            } elseif ($option == 4) {
                echo "\nTo open the door you need to check inside the box.\n";
            } elseif ($option == 5) {
                echo "\nGood bye";
                exit;
            } else {
                echo "\nInvalid entry. Try again.\n";
            }
        }
    }
}

$game = new EscapeRoomSimulator;
$game->play();
