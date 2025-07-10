<?php

class QuizGame
{
    private array $questions = [];

    public function __construct()
    {

        $this->questions = [
            [
                'question' => "What does HTML stand for?",
                'options' => ['A) Hyper Trainer Marking Language', 'B) HyperText Markup Language', 'C) HyperText Markdown Language', 'D) HighText Machine Language'],
                'answer' => 'B'
            ],
            [
                'question' => "Which programming language is primarily used for developing Android apps?",
                'options' => ['A) Python', 'B) Kotlin', 'C) Swift', 'D) Ruby'],
                'answer' => 'B'
            ],
            [
                'question' => "What does SQL stand for?",
                'options' => ['A) Structured Question Language', 'B) Strong Question List', 'C) Structured Query Language', 'D) Simple Query Language'],
                'answer' => 'C'
            ],
            [
                'question' => "Which company developed the Python programming language?",
                'options' => ['A) Microsoft', 'B) Bell Labs', 'C) Python Software Foundation', 'D) Google'],
                'answer' => 'C'
            ],
            [
                'question' => "What is the default port number for HTTP?",
                'options' => ['A) 443', 'B) 21', 'C) 25', 'D) 80'],
                'answer' => 'D'
            ]
        ];
    }

    public function startQuiz()
    {
        shuffle($this->questions);
        $score = 0;

        foreach ($this->questions as $q) {
            echo "\n" . $q['question'] . PHP_EOL;
            foreach ($q['options'] as $option) {
                echo $option . PHP_EOL;
            }

            $input = strtoupper(trim(readline("Enter an option: ")));

            if ($input === $q['answer']) {
                echo "Correct\n";
                $score++;
            } else {
                echo "Wrong\nCorrect answer is " . $q['answer'] . "\n";
            }
        }

        echo "\nYour final score is $score / " . count($this->questions) . PHP_EOL;
    }
}

$quiz = new QuizGame();
$quiz->startQuiz();
