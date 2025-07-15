<?php
class  Magic8Ball
{

    public $question;

    public function play()
    {

        $this->question = readline("Ask the question: ");

        $random = rand(1, 8);

        if ($random == 1) {

            echo "My reply is no.\n";
        } elseif ($random == 2) {

            echo "Yes definitly.\n";
        } elseif ($random == 3) {

            echo "Cannot predict now.\n";
        } elseif ($random == 4) {

            echo "Concentrate and ask again.\n";
        } elseif ($random == 5) {

            echo "Most likely.\n";
        } elseif ($random == 6) {

            echo "My sources say no.\n";
        } elseif ($random == 7) {

            echo "Signs point to yes.\n";
        } elseif ($random == 8) {

            echo "Ask again later.\n";
        }
    }
}

$ball = new Magic8Ball;
$ball->play();
