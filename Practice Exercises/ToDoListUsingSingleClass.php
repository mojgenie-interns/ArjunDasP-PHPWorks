<?php

class ToDoApp
{

    private $dataFile = "data.json";
    private $data = [];
    private $fileName;

    public function __construct()
    {
        if (file_exists($this->dataFile)) $this->data = json_decode(file_get_contents($this->dataFile), true);
    }

    function save()
    {
        file_put_contents($this->dataFile, json_encode($this->data, JSON_PRETTY_PRINT));
    }

    public function run()
    {
        while (true) {
            echo "\nMAIN MENU\n";
            echo "A. View to-do lists\n";
            echo "B. Create to-do list\n";
            echo "C. Exit\n";
            echo "Select an option: ";

            $choice = readline("");
            if ($choice == 'a' || $choice == 'A')
                $this->viewLists();
            elseif ($choice == 'b' || $choice == 'B')
                $this->createList();
            elseif ($choice == 'c' || $choice == 'C') {
                $this->save();
                break;
            }
        }
    }

    private function viewLists()
    {
        echo "\nTO-DO LIST" . PHP_EOL;
        if (empty($this->data)) {
            echo "No lists available.";
            return;
        }
        foreach ($this->data as $index => $list)
            echo ($index + 1) . ". " . $list['title'] . "\n";
        $this->manageList();
    }

    private function createList()
    {
        $title = readline("Enter the list name: ");
        $this->data[] = ['title' => $title, 'tasks' => []];
        $this->save();
        echo "Created list.\n";
    }

    function manageList()
    {
        $index = readline("\nSelect the list: ");
        $index--;
        if (!isset($this->data[$index])) {
            echo "Invalid selection.";
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
            if ($choice == 'a' || $choice == 'A')
                $this->viewTasks($index);
            elseif ($choice == 'b' || $choice == 'B')
                $this->createTask($index);
            elseif ($choice == 'c' || $choice == 'C') {
                $this->data[$index]['title'] = readline("Enter the new title: ");
                $this->save();
            } elseif ($choice == 'd' || $choice == 'D') {
                unset($this->data[$index]);
                $this->data = array_values($this->data);
                $this->save();
                echo "List deleted\n";
                break;
            } elseif ($choice == 'e' || $choice == 'E')
                break;
        }
    }

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
            echo "\n" . ($i + 1) . ":{$status}:{$task['created_date']}:{$task['target_date']}:{$task['completed_date']}:{$task['title']}";
        }

        $line = readline("\nSelect the task: ");
        $taskIndex = $line - 1;
        if (!isset($tasks[$taskIndex])) {
            echo "Invalid task.\n";
            return;
        }

        $this->manageTask($listIndex, $taskIndex);
    }

    function createTask($listIndex)
    {
        $title = readline("Enter the task: ");
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
            echo "Task: " . $task['title'] . PHP_EOL;
            echo "Status: " . ($task['completed'] ? 'Completed' : 'Not completed') . PHP_EOL;
            echo "Created date: " . $task['created_date'] . PHP_EOL;
            echo "Target date: " . $task['target_date'] . PHP_EOL;
            echo "Completed date: " . $task['completed_date'] . PHP_EOL;

            echo "\nA. Mark as " . ($task['completed'] ? 'not completed' : 'completed') . PHP_EOL;
            echo "B. Change target date" . PHP_EOL;
            echo "C. Change task" . PHP_EOL;
            echo "D. Delete task" . PHP_EOL;
            echo "E. Return" . PHP_EOL;
            echo "Select an option: ";

            $choice = readline("");
            if ($choice == 'a' || $choice == 'A') {
                $task['completed'] = !$task['completed'];
                $task['completed_date'] = $task['completed'] ? date('Y-m-d') : '';
                $this->save();
            } elseif ($choice == 'b' || $choice == 'B') {
                $task['target_date'] = readline("Enter the new target date: ");
                $this->save();
            } elseif ($choice == 'c' || $choice == 'C') {
                $task['title'] = readline("Enter the task: ");
                $this->save();
            } elseif ($choice == 'd' || $choice == 'D') {
                unset($this->data[$listIndex]['tasks'][$taskIndex]);
                $this->data[$listIndex]['tasks'] = array_values($this->data[$listIndex]['tasks']);
                $this->save();
                echo "Task deleted.\n";
                break;
            } elseif ($choice == 'e' || $choice == 'E')
                break;
        }
    }
}

$app = new ToDoApp();
$app->run();
