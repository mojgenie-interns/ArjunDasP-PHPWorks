<?php

namespace Task;

use ToDoApp\ToDoApp;

require 'ToDoApp.php';

class Task extends ToDoApp
{
    function viewTasks($listIndex)
    {
        $tasks = $this->data[$listIndex]['tasks'];
        if (empty($tasks)) {
            echo "No tasks.\n";
            return;
        }

        echo "\n" . strtoupper($this->data[$listIndex]['title']) . " - TASKS";
        foreach ($tasks as $i => $task) {
            $status = $task['completed'] ? '[x]' : '[ ]';
            echo "\n" . ($i + 1) . ". {$status} | Created: {$task['created_date']} | Target: {$task['target_date']} | Completed: {$task['completed_date']} | {$task['title']}";
        }

        $line = readline("\nEnter the task number: ");
        $taskIndex = $line - 1;
        if (!isset($tasks[$taskIndex])) {
            echo "Invalid task selection.\n";
            return;
        }

        $this->manageTask($listIndex, $taskIndex);
    }

    function createTask($listIndex)
    {
        $title = readline("Enter the task title: ");
        $targetDate = readline("Enter the target date (YYYY-MM-DD): ");
        $task = [
            'title' => $title,
            'created_date' => date('Y-m-d'),
            'target_date' => $targetDate,
            'completed' => false,
            'completed_date' => ''
        ];
        $this->data[$listIndex]['tasks'][] = $task;
        $this->save();
        echo "Task added.\n";
    }

    public function manageTask($listIndex, $taskIndex)
    {
        $task = &$this->data[$listIndex]['tasks'][$taskIndex];

        while (true) {
            echo "\n" . strtoupper($task['title']) . PHP_EOL;
            echo "To-do list: " . $this->data[$listIndex]['title'] . PHP_EOL;
            echo "Status: " . ($task['completed'] ? 'Completed' : 'Not completed') . PHP_EOL;
            echo "Created date: " . $task['created_date'] . PHP_EOL;
            echo "Target date: " . $task['target_date'] . PHP_EOL;
            echo "Completed date: " . $task['completed_date'] . PHP_EOL;

            echo "\nA. Mark as " . ($task['completed'] ? 'not completed' : 'completed') . PHP_EOL;
            echo "B. Change target date" . PHP_EOL;
            echo "C. Change task title" . PHP_EOL;
            echo "D. Delete task" . PHP_EOL;
            echo "E. Return" . PHP_EOL;
            echo "Select an option: ";

            $choice = readline();
            if (strtolower($choice) == 'a') {
                $task['completed'] = !$task['completed'];
                $task['completed_date'] = $task['completed'] ? date('Y-m-d') : '';
                $this->save();
            } elseif (strtolower($choice) == 'b') {
                $task['target_date'] = readline("Enter the new target date: ");
                $this->save();
            } elseif (strtolower($choice) == 'c') {
                $task['title'] = readline("Enter the new task title: ");
                $this->save();
            } elseif (strtolower($choice) == 'd') {
                unset($this->data[$listIndex]['tasks'][$taskIndex]);
                $this->data[$listIndex]['tasks'] = array_values($this->data[$listIndex]['tasks']);
                $this->save();
                echo "Task deleted.\n";
                break;
            } elseif (strtolower($choice) == 'e') {
                break;
            }
        }
    }
}
