<?php

class LabEscape
{

    public $puzzle = [];

    function __construct()
    {
        $this->puzzle = [
            [
                "question" => "What is the chemical symbol for Gold?",
                "options" => ["Au", "Ag", "Gu", "Ar"],
                "answer" => "Au"
            ],
            [
                "question" => "Which planet is known as the Red Planet?",
                "options" => ["Venus", "Mars", "Jupiter", "Mercury"],
                "answer" => "Mars"
            ],
            [
                "question" => "Name the largest planet.",
                "options" => ["Earth", "Jupiter", "Mars", "Saturn"],
                "answer" => "Jupiter"
            ],
            [
                "question" => "What part of the cell contains the genetic material?",
                "options" => ["Cytoplasm", "Ribosome", "Nucleus", "Mitochondria"],
                "answer" => "Nucleus"
            ],
            [
                "question" => "What gas do plants absorb from the atmosphere?",
                "options" => ["Oxygen", "Nitrogen", "Carbon Dioxide", "Hydrogen"],
                "answer" => "Carbon Dioxide"
            ]
        ];
    }

    public function getQuestion()
    {
        $index = array_rand($this->puzzle);
        $question = $this->puzzle[$index];

        echo "\n" . $question['question'] . "\n";

        foreach ($question['options'] as $key => $option) {
            echo ($key + 1) . ") $option ";
        }

        return $question;
    }

    public function runGame()
    {
        echo "\n||||| LAB ESCAPE |||||\n";
        sleep(2);
        echo "\nYou are locked inside a lab.\n";
        sleep(2);
        echo "To escape, solve the following puzzles:\n";
        sleep(2);



        $question1 = $this->getQuestion();
        $answer1 = strtolower(readline("\nEnter the answer: "));


        if ($answer1 === strtolower($question1['answer'])) {
            echo "\nCorrect. You passed the first door.\n";
            sleep(2);
            echo "\nYou are now in the next room. Solve one more puzzle to escape:\n";

            sleep(2);
            $question2 = $this->getQuestion();
            $answer2 = strtolower(readline("\nEnter the answer: "));

            if ($answer2 === strtolower($question2['answer'])) {
                echo "\nYou solved both puzzles and escaped the lab successfully.\n";
            } else {
                echo "\nWrong answer. You failed to escape the second room.\n";
            }
        } else {
            echo "\nWrong answer. You failed to unlock the first door.\n";
        }
    }
}

$escape = new LabEscape();
$escape->runGame();
