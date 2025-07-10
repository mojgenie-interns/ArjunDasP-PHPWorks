<?php

class Node
{
    public $data;
    public $next;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class LinkedList
{
    private $head;

    function __construct()
    {
        $this->head = null;
    }

    function insertItem() //At the end
    {
        $data = readline("\nEnter the item: ");
        $newNode = new Node($data);
        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
        echo "Item added successfully.\n";
    }


    function deleteItem()
    {
        if ($this->head === null) {
            echo "\nList is empty.\n";
            return;
        }

        $data = readline("\nEnter the item: ");
        if ($this->head->data == $data) {
            $this->head = $this->head->next;
            return;
        }

        $current = $this->head;
        while ($current->next !== null && $current->next->data != $data) {
            $current = $current->next;
        }

        if ($current->next === null) {
            echo "\nItem not found.\n";
        } else {
            $current->next = $current->next->next;
        }
    }

    function displayList()
    {
        echo "\n";
        if ($this->head === null) {
            echo "List is empty.\n";
            return;
        }

        $current = $this->head;
        while ($current !== null) {
            echo $current->data . " → ";
            $current = $current->next;
        }
        echo "NULL\n";
    }

    function run()
    {
        while (true) {
            echo "\n+++ LINKED LIST +++\n1. Insert item\n2. Delete item\n3. Traverse list\n4. Exit\n";
            $option = readline("Enter the option: ");
            if ($option == 1) {
                $this->insertItem();
            } elseif ($option == 2) {
                $this->deleteItem();
            } elseif ($option == 3) {
                $this->displayList();
            } elseif ($option == 4) {
                return;
            } else
                echo "Invalid entry. Try again.\n";
        }
    }
}

$list = new LinkedList();
$list->run();
