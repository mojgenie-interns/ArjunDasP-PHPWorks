<?php

class Queue
{
    public array $queue;
    public int $front;
    public int $rear;
    public int $size;

    function __construct()
    {
        $this->queue = [];
        $this->front = -1;
        $this->rear = -1;
        $this->size = (int)readline("Enter the size: ");
    }

    function displayQueue()
    {
        if ($this->front == -1 || $this->front > $this->rear) {
            echo "\nQueue is empty.\n";
            return;
        }

        echo "\n[ ";
        for ($i = $this->front; $i <= $this->rear; $i++) {
            echo $this->queue[$i] . " ";
        }
        echo "]\n";
    }

    function insert()
    {
        if ($this->rear == $this->size - 1) {
            echo "\nQueue is full!\n";
            return;
        }

        $item = readline("\nEnter the number: ");

        if ($this->front == -1) {
            $this->front = 0;
        }

        $this->rear++;
        $this->queue[$this->rear] = $item;
    }

    function delete()
    {
        if ($this->front == -1 || $this->front > $this->rear) {
            echo "\nQueue is empty!\n";
            return;
        }

        unset($this->queue[$this->front]);
        $this->front++;

        if ($this->front > $this->rear) {
            $this->front = -1;
            $this->rear = -1;
        }
    }

    function menu()
    {
        while (true) {
            echo "\n=== QUEUE ===";
            $choice = readline("\n1. Display\n2. Insert\n3. Delete\n4. Exit\nEnter the option: ");
            if ($choice == 1)
                $this->displayQueue();
            elseif ($choice == 2)
                $this->insert();
            elseif ($choice == 3)
                $this->delete();
            elseif ($choice == 4) {
                break;
            } else
                echo "Invalid entry. Try again.\n";
        }
    }
}

$queue1 = new Queue;
$queue1->menu();
