<?php

class Notes
{
    public $title;
    public $content;
    public $dataFile = 'notes.json';
    public $notes = [];

    public function __construct()
    {
        if (file_exists($this->dataFile)) {
            $this->notes = json_decode(file_get_contents($this->dataFile), true) ?? [];
        }
    }

    public function notesApp()
    {
        while (true) {
            echo "\n##### NOTES APP #####";
            echo "\n1. Create note";
            echo "\n2. View notes";
            echo "\n3. Edit note";
            echo "\n4. Delete note";
            echo "\n5. Quit\n";
            $choice = readline("Enter your choice: ");
            if ($choice == 1) {
                $this->addNote();
            } elseif ($choice == 2) {
                $this->viewNotes();
            } elseif ($choice == 3) {
                $this->editNotes();
            } elseif ($choice == 4) {
                $this->deleteNotes();
            } elseif ($choice == 5) {
                exit;
            } else {
                echo "\nInvalid choice. Try again.\n";
            }
        }
    }

    public function save()
    {
        file_put_contents($this->dataFile, json_encode($this->notes, JSON_PRETTY_PRINT));
    }

    public function addNote()
    {
        $this->title = readline("\nTitle: ");
        $this->content = readline("Content: ");
        $this->notes[] = [
            "title" => $this->title,
            "content" => $this->content
        ];
        $this->save();
        echo "\nNote created successfully.\n";
    }

    public function viewNotes()
    {
        if (empty($this->notes)) {
            echo "\nNo notes found.\n";
            return;
        }
        echo "\n##### Notes #####\n";
        $count = 1;
        foreach ($this->notes as $note) {
            if (is_array($note) && isset($note['title']) && isset($note['content'])) {
                echo $count . ". " . $note['title'] . ": " . $note['content'] . "\n";
                $count++;
            }
        }
        if ($count === 1) {
            echo "No notes found.\n";
        }
    }

    public function editNotes()
    {
        if (empty($this->notes)) {
            echo "\nNo notes to edit.\n";
            return;
        }

        $this->viewNotes();
        $update = readline("\nEnter the note to edit: ");
        $index = (int)$update - 1;

        $validIndexes = [];
        foreach ($this->notes as $i => $note) {
            if (is_array($note) && isset($note['title']) && isset($note['content'])) {
                $validIndexes[] = $i;
            }
        }

        if (!isset($validIndexes[$index])) {
            echo "\nInvalid number.\n";
            return;
        }

        $realIndex = $validIndexes[$index];

        $choice1 = strtolower(readline("\nWhat do you want to update (title/content)? "));

        if ($choice1 == "title") {
            $newTitle = readline("Enter new title: ");
            $this->notes[$realIndex]['title'] = $newTitle;
            echo "\nTitle updated successfully.\n";
        } elseif ($choice1 == "content") {
            $newContent = readline("Enter new content: ");
            $this->notes[$realIndex]['content'] = $newContent;
            echo "\nContent updated successfully.\n";
        } else {
            echo "\nInvalid choice.\n";
            return;
        }

        $this->save();
    }

    public function deleteNotes()
    {
        if (empty($this->notes)) {
            echo "\nNo notes to delete.\n";
            return;
        }

        $this->viewNotes();
        $deleteIndex = readline("Enter the note to delete: ");
        $index = (int)$deleteIndex - 1;

        // Skip over bad data in the notes array by counting only valid items
        $validIndexes = [];
        foreach ($this->notes as $i => $note) {
            if (is_array($note) && isset($note['title']) && isset($note['content'])) {
                $validIndexes[] = $i;
            }
        }

        if (!isset($validIndexes[$index])) {
            echo "\nInvalid note number.\n";
            return;
        }

        $realIndex = $validIndexes[$index];
        unset($this->notes[$realIndex]);
        $this->notes = array_values($this->notes); // Reindex
        $this->save();
        echo "\nNote deleted successfully.\n";
    }
}

$object = new Notes();
$object->notesApp();
