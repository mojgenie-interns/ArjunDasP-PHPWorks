<?php


class InventorySystem
{

    public $name;
    public $price;
    public $quantity;
    public $list = [];
    public $dataFile = 'inventory.json';

    public function __construct()
    {

        if (file_exists($this->dataFile)) {
            $this->list = json_decode(file_get_contents($this->dataFile), true) ?? []; //Null coalescing operator
        } else {
            $this->list = [];
        }
    }


    public function menu()
    {


        echo "\n---> INVENTORY SYSTEM <---\n";
        echo "1. Add item\n";
        echo "2. View inventory\n";
        echo "3. Edit item\n";
        echo "4. Delete item\n";
        echo "5. Exit\n";
        $choice = readline("Enter the option: ");
        if ($choice == 1) {
            $this->addItem();
        } elseif ($choice == 2) {
            $this->viewItems($this->list);
        } elseif ($choice == 3) {
            $this->editItem();
        } elseif ($choice == 4) {
            $this->deleteItem();
        } elseif ($choice == 5) {
            exit;
        } else {
            echo "\nInvalid choice. Try again.\n";
        }
    }


    public function save()
    {

        file_put_contents($this->dataFile, json_encode($this->list, JSON_PRETTY_PRINT));
    }

    public function addItem()
    {

        $this->name = readline("\nEnter the item: ");
        $this->quantity = readline("Enter the quantity: ");
        $this->price = readline("Enter the price: ");

        $this->list[] = [
            "item" => $this->name,
            "quantities" => $this->quantity,
            "cost" => $this->price,
        ];

        $this->save();
        echo "\nItem added successfully.\n";
    }

    public function viewItems($lists)
    {
        foreach ($lists as $index => $list) { //For index.
            echo "\n" . ($index + 1) . "\t|";
            echo " Item: " . $list['item'] . "\t|";
            echo " Quantity: " . $list['quantities'] . "\t|";
            echo " Price: " . $list['cost'];
        }
        echo "\n";
    }

    public function editItem()
    {

        if (empty($this->list)) {
            echo "\nNo item found.\n";
            return;
        }

        $this->viewItems($this->list);

        $update = readline("\nEnter the index number to edit: ");

        $index = (int)$update - 1;

        if (!isset($this->list[$index])) {
            echo "\nInvalid  number.\n";
            return;
        }

        echo "\nWhat do you want to edit?\n";
        echo "1. Item name\n";
        echo "2. Price \n";
        echo "3. Quantity\n";
        $choice1 = readline("Enter the option: ");

        if ($choice1 == 1) {
            $newName = readline("\nEnter the new name: ");
            $this->list[$index]['item'] = $newName;
        } elseif ($choice1 == 2) {
            $newPrice = readline("\nEnter the new price: ");
            $this->list[$index]['cost'] = $newPrice;
        } elseif ($choice1 == 3) {
            $newQuantity = readline("\nEnter the new quantity: ");
            $this->list[$index]['quantities'] = $newQuantity;
        } else {
            echo "\nInvalid choice.\n";
        }
        $this->save();
        echo "\nItem edited successfully.\n";
    }


    public function deleteItem()
    {

        if (empty($this->list)) {
            echo "\nNo items found.\n";
            return;
        }

        $this->viewItems($this->list);

        $deleteIndex = readline("\nEnter the number to delete: ");
        $deleteIndex = (int)$deleteIndex - 1;

        if (isset($this->list[$deleteIndex])) {
            unset($this->list[$deleteIndex]);
            $this->list = array_values($this->list); //Re-indexes
            file_put_contents($this->dataFile, json_encode($this->list, JSON_PRETTY_PRINT));
            echo "\nItem deleted successfully.\n";
        } else {
            echo "\nInvalid item number.\n";
        }
    }
}


$object = new InventorySystem();

while (true) {

    $object->menu();
}
