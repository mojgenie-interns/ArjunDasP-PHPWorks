<?php

// require_once 'vendor/autoload.php';

// use Twilio\Rest\Client;



class ContactBook
{

    private $file = 'contacts.json';
    private array $contacts = [];
    // private Client $client;

    function __construct()
    {

        if (file_exists($this->file))
            $this->contacts = json_decode(file_get_contents($this->file), true);
<<<<<<< HEAD
=======

        // $sid = 'ACeb2a1190572dbad7ddebaf26380d3726';
        // $token = '83ba2b4e503c706f9c61ecb2290ff9b0';
>>>>>>> c19ca45 (Pushing new files)
        // $this->client = new Client($sid, $token);
    }

    function createContact()
    {

        $name = readline("\nName: ");
        foreach ($this->contacts as $contact)
            if ($contact['name'] === $name) {
                echo "\nContact already exists!\n";
                return;
            }

        $number = readline("Number: ");
        $this->contacts[] = ['name' => $name, 'number' => $number];
        echo "\nContact created successfully.\n";
        $this->saveContact();
    }

    function viewContacts()
    {

        if (empty($this->contacts)) {
            echo "\nNo contacts found.\n";
            return;
        }

        foreach ($this->contacts as $contact) {
            echo $contact['name'] . ": " . $contact['number'] . PHP_EOL;
        }
    }

    // function callContact()
    // {
    //     $name = readline("\nEnter the contact name to call: ");
    //     foreach ($this->contacts as $contact) {
    //         if ($contact['name'] === $name)
    //             echo "Calling " . $name . "...";

    //         $call = $this->client->calls->create(
    //             $contact['number'],
    //             '+918547323068',
    //             ["url" => "http://demo.twilio.com/docs/voice.xml"]
    //         );
    //     }
    //     echo "\nContact not found.";
    // }

    function editContact()
    {
        $name = readline("\nEnter the name to edit: ");
        foreach ($this->contacts as $index => $contact) {
            if ($contact['name'] === $name) {
                $newName = readline("\nEnter the new name: ");
                $this->contacts[$index]['name'] = $newName;
                $newNumber = readline("Enter the new number: ");
                $this->contacts[$index]['number'] = $newNumber;
                echo "\nContact edited successfully.\n";
                return;
            }
        }
        echo "\nContact not found";
    }

    function saveContact()
    {
        file_put_contents($this->file, json_encode($this->contacts, JSON_PRETTY_PRINT));
    }

    function deleteContact()
    {
        $name = readline("\nEnter the name to delete: ");

        foreach ($this->contacts as $index => $contact) {
            if ($contact['name'] === $name) {
                unset($this->contacts[$index]);
                $this->contacts = array_values($this->contacts);
                $this->saveContact();
                echo "\nContact deleted successfully.\n";
                return;
            }
        }
        echo "\nContact not found\n";
    }

    function run()
    {
        while (true) {
            echo "\n### CONTACT BOOK ###\n";
            $option = readline("1. View contacts\n2. Create contact\n3. Edit contact\n4. Delete contact\n5. Exit\nEnter the option: ");
            if ($option == 1) {
                $this->viewContacts();
            } elseif ($option == 2) {
                $this->createContact();
            } elseif ($option == 3) {
                $this->editContact();
            } elseif ($option == 4) {
                $this->deleteContact();
            } elseif ($option == 5) {
                exit;
            } else
                echo "Invalid entry. Try again.";
        }
    }
}

$contact = new ContactBook;
$contact->run();
