<?php

class ZooManagementSystem
{
    private $file = 'animal-list.json';
    private array $animals = [];

    function __construct()
    {
        if (file_exists($this->file))
            $this->animals = json_decode(file_get_contents($this->file), true);
    }

    function save()
    {
        file_put_contents($this->file, json_encode($this->animals, JSON_PRETTY_PRINT));
    }

    function addAnimal()
    {
        $mamal = readline("\nAnimal: ");
        $animalType = readline("Type: ");
        $animalName = readline("Name: ");
        $animalAge = readline("Age: ");

        do {
            $animalSex = (readline("Sex: "));
            if ($animalSex !== 'male' && $animalSex !== 'female') {
                echo "Invalid input. Please enter 'male' or 'female'.\n";
            }
        } while ($animalSex !== 'male' && $animalSex !== 'female');

        $this->animals[] = [
            'animal' => $mamal,
            'type'   => $animalType,
            'name'   => $animalName,
            'age'    => $animalAge,
            'sex'    => $animalSex
        ];

        echo "\nAnimal added successfully.\n";
        $this->save();
    }

    function deleteAnimal()
    {
        $name = readline("\nEnter the name to remove: ");

        foreach ($this->animals as $index => $animal) {
            if ($animal['name'] === $name) {
                unset($this->animals[$index]);
                $this->animals = array_values($this->animals); // reindex
                $this->save();
                echo "\nRemoved animal successfully.\n";
                return;
            }
        }
        echo "\nAnimal not found.\n";
    }

    function viewAnimals()
    {
        if (empty($this->animals)) {
            echo "\nNo animals found.\n";
            return;
        }
        foreach ($this->animals as $animal) {
            echo "\n{$animal['animal']}\t{$animal['type']}\t{$animal['name']}\t{$animal['age']}\t{$animal['sex']}\n";
        }
    }

    function run()
    {
        while (true) {
            echo "\n### ZOO MANAGEMENT SYSTEM ###\n";
            echo "1. View animals\n2. Add animal\n3. Delete animal\n4. Exit\n";
            $option = readline("Enter the option: ");
            if ($option == 1) {
                $this->viewAnimals();
            } elseif ($option == 2) {
                $this->addAnimal();
            } elseif ($option == 3) {
                $this->deleteAnimal();
            } elseif ($option == 4) {
                exit;
            } else {
                echo "\nInvalid entry. Try again.\n";
            }
        }
    }
}

$zoo = new ZooManagementSystem;
$zoo->run();
