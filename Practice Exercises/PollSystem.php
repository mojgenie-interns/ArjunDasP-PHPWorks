<?php

class PollSystem {
    private string $question;
    private array $options;
    private array $votes;

    public function __construct() {
        $this->question = "What is your favorite programming language?";
        $this->options = [
            'A' => "PHP",
            'B' => "Python",
            'C' => "JavaScript",
            'D' => "Java"
        ];
        $this->votes = [
            'A' => 0,
            'B' => 0,
            'C' => 0,
            'D' => 0
        ];
    }

    public function displayMenu() {
        while (true) {
            echo "\n=== POLL SYSTEM ===\n";
            echo "1. Vote\n";
            echo "2. View Results\n";
            echo "3. Exit\n";

            $choice = readline("Enter an option: ");

            switch ($choice) {
                case '1':
                    $this->vote();
                    break;
                case '2':
                    $this->showResults();
                    break;
                case '3':
                    echo "Good bye\n";
                    exit;//Exit
                default:
                    echo "Invalid choice. Try again.\n";
            }
        }
    }

    private function vote() {
        echo "\n" . $this->question . "\n";
        foreach ($this->options as $key => $option) {
            echo "$key) $option\n";
        }

        $vote = strtoupper(readline("Enter your vote: "));

        if (array_key_exists($vote, $this->votes)) {
            $this->votes[$vote]++;
            echo "Thank you for voting.\n";
        } else {
            echo "Invalid option.\n";
        }
    }

    private function showResults() {
        echo "\n--- Poll Results ---\n";
        foreach ($this->options as $key => $option) {
            echo "$option: {$this->votes[$key]} votes\n";
        }
    }
}

$poll = new PollSystem();
$poll->displayMenu();
