<?php
class BankAccountSimulator
{

    public $balance;
    public $accountNumber;
    public $accountHolder;
    public $dataFile = 'accounts.json';

    function __construct()
    {
        $this->balance  = 0;
    }

    public  function generateAccountNumber()
    {
        $file = "account_counter.txt";

        if (!file_exists($file)) {
            file_put_contents($file, 1);
        }

        $current = (int) file_get_contents($file);
        $accountNumber = "ACC" . str_pad($current, 6, "0", STR_PAD_LEFT);
        file_put_contents($file, $current + 1);

        return $accountNumber;
    }

    public function createAccount()
    {

        $this->accountHolder = readline("\nEnter the name: ");
        $this->accountNumber = $this->generateAccountNumber();
        $this->balance = 0;

        if (file_exists($this->dataFile)) {
            $json = file_get_contents($this->dataFile);
            $accounts = json_decode($json, true);
        }

        $accounts[] = [
            "name" => $this->accountHolder,
            "account_number" => $this->accountNumber,
            "balance" => $this->balance
        ];

        file_put_contents($this->dataFile, json_encode($accounts, JSON_PRETTY_PRINT));
        echo "\nAccount created.\n";
    }

    public function depositMoney()
    {

        if (!file_exists($this->dataFile)) {
            echo "\nNo accounts found.\n";
            return;
        }

        $accNumber = strtoupper(readline("\nEnter the account number: "));

        $json = file_get_contents($this->dataFile);
        $accounts = json_decode($json, true);
        $found = false;

        foreach ($accounts as &$account) {
            if ($account['account_number'] === $accNumber) {
                $amount = readline("Enter the amount: ");

                if (!is_numeric($amount) || $amount <= 0) {
                    echo "\nInvalid amount.\n";
                    return;
                }

                $account['balance'] += $amount;
                $found = true;
                echo "\n₹$amount deposited successfully.\nNew balance: ₹{$account['balance']}\n";
                break;
            }
        }

        if (!$found) {
            echo "\nAccount not found.\n";
            return;
        }


        file_put_contents($this->dataFile, json_encode($accounts, JSON_PRETTY_PRINT));
    }


    public function withdrawMoney()
    {

        if (!file_exists($this->dataFile)) {
            echo "\nNo accounts found.\n";
            return;
        }

        $accNumber = strtoupper(readline("\nEnter the account number: "));

        $json = file_get_contents($this->dataFile);
        $accounts = json_decode($json, true);
        $found = false;

        foreach ($accounts as &$account) {
            if ($account['account_number'] === $accNumber) {
                $amount = (int)(readline("Enter the amount: "));

                if (!is_numeric($amount) || $account['balance'] <= $amount) {
                    echo "\nInsufficient  balance.\n";
                    return;
                }

                $account['balance'] -= $amount;
                $found = true;
                echo "\n₹$amount withdrawed successfully.\nNew balance: ₹{$account['balance']}\n";
                break;
            }
        }

        if (!$found) {
            echo "\nAccount not found.\n";
            return;
        }


        file_put_contents($this->dataFile, json_encode($accounts, JSON_PRETTY_PRINT));
    }
}

$object = new BankAccountSimulator();

while (true) {
    echo "\n##### ADP BANK #####\n";
    echo "1. Create account\n2. Deposit money\n3. Withdraw \n4. Exit\n";
    $choice = readline("Enter the option: ");
    switch ($choice) {
        case 1:
            $object->createAccount();
            break;
        case 2:
            $object->depositMoney();
            break;
        case 3:

            $object->withdrawMoney();
            break;
        case 4:
            exit;

        default:
            echo "\nInvalid choice. Try again.\n";
    }
}
