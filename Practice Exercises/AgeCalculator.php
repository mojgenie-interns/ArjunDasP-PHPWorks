<?php

class AgeCalculator
{
    private $dateOfBirth;

    function getDateOfBirth()
    {
        $input = readline("Enter your date of birth (YYYY-MM-DD): ");
        $this->dateOfBirth = DateTime::createFromFormat('Y-m-d', $input);

        if (!$this->dateOfBirth) { //is false?
            echo "Invalid date format.\n";
            exit;
        }
    }

    function findAgeAtTheDate()
    {
        $input = readline("Enter the date you want to calculate age at (YYYY-MM-DD): ");
        $targetDate = DateTime::createFromFormat('Y-m-d', $input);

        if (!$targetDate) {
            echo "Invalid date format.\n";
            exit;
        }

        $interval = $this->dateOfBirth->diff($targetDate);
        echo "Your age on {$targetDate->format('Y-m-d')} is {$interval->y} years, {$interval->m} months, and {$interval->d} days.\n";
    }
}

$calculator = new AgeCalculator();
$calculator->getDateOfBirth();
$calculator->findAgeAtTheDate();
