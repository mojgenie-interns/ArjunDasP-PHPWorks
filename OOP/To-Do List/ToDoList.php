<?php

use Task\Task;

require 'Task.php';

class ToDoList extends Task
{
    public function run()
    {
        while (true) {
            echo "\nMAIN MENU\n";
            echo "A. View to-do lists\n";
            echo "B. Create to-do list\n";
            echo "C. Exit\n";
            echo "Select an option: ";

            $choice = readline();
            if (strtolower($choice) == 'a') {
                $this->viewLists();
            } elseif (strtolower($choice) == 'b') {
                $this->createList();
            } elseif (strtolower($choice) == 'c') {
                $this->save();
                echo "Goodbye!\n";
                break;
            }
        }
    }

    private function viewLists()
    {
        echo "\nTO-DO LISTS\n";
        if (empty($this->data)) {
            echo "No lists available.\n";
            return;
        }
        foreach ($this->data as $index => $list) {
            echo ($index + 1) . ". " . $list['title'] . "\n";
        }
        $this->manageList();
    }

    private function createList()
    {
        $title = readline("Enter the list name: ");
        $this->data[] = ['title' => $title, 'tasks' => []];
        $this->save();
        echo "Created list: $title\n";
    }

    function manageList()
    {
        $index = readline("\nEnter the list number: ");
        $index--;
        if (!isset($this->data[$index])) {
            echo "Invalid selection.\n";
            return;
        }

        while (true) {
            echo "\n" . strtoupper($this->data[$index]['title']) . PHP_EOL;
            echo "A. View tasks\n";
            echo "B. Create new task\n";
            echo "C. Rename list\n";
            echo "D. Delete list\n";
            echo "E. Return to main menu\n";
            echo "Select an option: ";

            $choice = readline();
            if (strtolower($choice) == 'a') {
                $this->viewTasks($index);
            } elseif (strtolower($choice) == 'b') {
                $this->createTask($index);
            } elseif (strtolower($choice) == 'c') {
                $this->data[$index]['title'] = readline("Enter the new title: ");
                $this->save();
            } elseif (strtolower($choice) == 'd') {
                unset($this->data[$index]);
                $this->data = array_values($this->data);
                $this->save();
                echo "List deleted.\n";
                break;
            } elseif (strtolower($choice) == 'e') {
                break;
            }
        }
    }
}

$toDo = new ToDoList();
$toDo->run();
