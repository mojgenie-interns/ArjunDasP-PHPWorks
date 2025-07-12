<?php

class FlashcardApp
{
    private array $flashcards = [];

    public function addFlashcard()
    {
        $question = readline("\nEnter question: ");
        $answer = readline("Enter answer: ");
        $this->flashcards[] = ['question' => $question, 'answer' => $answer]; //Giving keys and values
    }

    public function viewFlashcards()
    {
        if (empty($this->flashcards)) {
            echo "No flashcards available.\n";
            return;
        }
        foreach ($this->flashcards as $index => $card) {
            echo ($index + 1) . ".{$card['question']}\nAnswer: {$card['answer']}\n";
        }
    }

    public function testFlashcards()
    {
        if (empty($this->flashcards)) {
            echo "No flashcards to test.\n";
            return;
        }

        shuffle($this->flashcards);

        foreach ($this->flashcards as $card) {
            echo "Q: {$card['question']}\n";
            $userAnswer = readline("Enter the answer: ");
            if (strtolower(trim($userAnswer)) === strtolower(trim($card['answer']))) {
                echo "Correct\n";
            } else {
                echo "Wrong. Correct answer is {$card['answer']}\n";
            }
        }
    }

    public function menu()
    {
        while (true) {
            echo "\n=== FLASHCARD APP ===\n";
            echo "1. Add Flashcard\n";
            echo "2. View Flashcards\n";
            echo "3. Test Yourself\n";
            echo "4. Exit\n";

            $choice = readline("Choose an option: ");

            switch ($choice) {
                case '1':
                    $this->addFlashcard();
                    break;
                case '2':
                    $this->viewFlashcards();
                    break;
                case '3':
                    $this->testFlashcards();
                    break;
                case '4':
                    exit;
                default:
                    echo "Invalid choice. Try again.\n";
            }
        }
    }
}


$app = new FlashcardApp();
$app->menu();
