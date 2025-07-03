<?php

namespace ToDoApp;

class ToDoApp
{
    protected $dataFile = "data.json";
    protected $data = [];

    public function __construct()
    {
        if (file_exists($this->dataFile)) {
            $this->data = json_decode(file_get_contents($this->dataFile), true);
        }
    }

    function save()
    {
        file_put_contents($this->dataFile, json_encode($this->data, JSON_PRETTY_PRINT));
    }
}
