<?php

class OddOneOut
{
    private array $questions = [];

    public function __construct()
    {
        $this->questions = [
            [
                'question' => [
                    'A) Apple',
                    'B) Banana',
                    'C) Carrot',
                    'D) Mango'
                ],
                'answer' => 'C' // Carrot is a vegetable; others are fruits
            ],
            [
                'question' => [
                    'A) Java',
                    'B) Python',
                    'C) HTML',
                    'D) C++'
                ],
                'answer' => 'C' // HTML is a markup language; others are programming languages
            ],
            [
                'question' => [
                    'A) Elephant',
                    'B) Tiger',
                    'C) Lion',
                    'D) Leopard'
                ],
                'answer' => 'A' // Elephant is not a big cat; others are
            ],
            [
                'question' => [
                    'A) January',
                    'B) June',
                    'C) March',
                    'D) December'
                ],
                'answer' => 'B' // June has 30 days; others have 31
            ],
            [
                'question' => [
                    'A) Facebook',
                    'B) Windows',
                    'C) Instagram',
                    'D) Twitter'
                ],
                'answer' => 'B' // Windows is an OS; others are social networks
            ]
        ];
    }

    public function startGame()
    {
        shuffle($this->questions);
        $score = 0;

        foreach ($this->questions as $q) {
            echo "\n";
            foreach ($q['question'] as $option) {
                echo $option . " ";
            }

            $input = strtoupper(trim(readline("\nSelect the odd one: ")));

            if ($input === $q['answer']) {
                echo "Correct.\n";
                $score++;
            } else {
                echo "\nWrong. Correct answer is " . $q['answer'] . ".\n";
            }
        }

        echo "\nYour final score is $score / " . count($this->questions) . ".\n";
    }
}

$quiz = new OddOneOut();
$quiz->startGame();
