<?php

class CastleDefender
{
    private $castleHealth = 5;
    private $waves = 5;

    public function play()
    {
        echo "CCCASTLE 🏰 DEFENDERRR\n";
        sleep(1);
        echo "Defend your castle for {$this->waves} enemy waves!\n";
        sleep(2);
        $name = readline("\nEnter your name: ");

        for ($wave = 1; $wave <= $this->waves && $this->castleHealth > 0; $wave++) {
            echo "\nWave $wave is approaching! Castle Health: {$this->castleHealth}\n";

            if ($this->askQuestion()) {
                echo "$name, you defended the castle successfully!\n";
            } else {
                $this->castleHealth--;
                echo "Wrong answer! The enemy damaged your castle. Castle Health now: {$this->castleHealth}\n";
            }
        }

        if ($this->castleHealth > 0) {
            echo "\n$name, you survived all enemy waves! Victory!\n";
        } else {
            echo "\nThe castle has fallen. Game over.\n";
        }
    }

    private function askQuestion()
    {
        $questions = [
            "What is 5 + 3?" => "8",
            "What color are bananas?" => "Yellow",
            "What is the capital of Germany?" => "Berlin",
            "What is 10 divided by 2?" => "5",
            "What is the opposite of day?" => "Night"
        ];

        $question = array_rand($questions);
        $answer = readline("Enemy Question - $question ");

        return strtolower(trim($answer)) === strtolower($questions[$question]);
    }
}

// Start the game
$game = new CastleDefender();
$game->play();
