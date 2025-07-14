<?php

class TemperatureConverter
{

    public $celsius;
    public $kelvin;
    public $fahrenheit;

    public function celsiusToFahrenheit()
    {
        $this->celsius = readline("\nEnter Celsius:\n");
        $this->fahrenheit = ($this->celsius * 9 / 5) + 32;
        echo "Fahrenheit: $this->fahrenheit\n";
    }

    public function fahrenheitToCelsius()
    {
        $this->fahrenheit = readline("\nEnter Fahrenheit:\n");
        echo "Celsius: " . (($this->fahrenheit - 32) * 5 / 9) . "\n";
    }

    public function celsiusToKelvin()
    {
        $this->celsius = readline("\nEnter Celsius:\n");
        echo "Kelvin: " . ($this->celsius + 273.15) . "\n";
    }

    public function kelvinToCelsius()
    {
        $this->kelvin = readline("\nEnter Kelvin:\n");
        echo "Celsius: " . ($this->kelvin - 273.15) . "\n";
    }

    public function fahrenheitToKelvin()
    {
        $this->fahrenheit = readline("\nEnter Fahrenheit:\n");
        echo "Kelvin: " . (($this->fahrenheit - 32) * 5 / 9 + 273.15) . "\n";
    }

    public function kelvinToFahrenheit()
    {
        $this->kelvin = readline("\nEnter Kelvin:\n");
        echo "Fahrenheit: " . (($this->kelvin - 273.15) * 9 / 5 + 32) . "\n";
    }

    public function runConverter()
    {
        echo "\\\\\ TEMPERATURE CONVERTER ///\n";
        echo "1. Celsius to Fahrenheit\n";
        echo "2. Fahrenheit to Celsius\n";
        echo "3. Celsius to Kelvin\n";
        echo "4. Kelvin to Celsius\n";
        echo "5. Fahrenheit to Kelvin\n";
        echo "6. Kelvin to Fahrenheit\n";
        $choice = readline("Enter the option: ");

        if ($choice == 1) {
            $this->celsiusToFahrenheit();
        } elseif ($choice == 2) {
            $this->fahrenheitToCelsius();
        } elseif ($choice == 3) {
            $this->celsiusToKelvin();
        } elseif ($choice == 4) {
            $this->kelvinToCelsius();
        } elseif ($choice == 5) {
            $this->fahrenheitToKelvin();
        } elseif ($choice == 6) {
            $this->kelvinToFahrenheit();
        } else {
            echo "\nInvalid option. Try again.\n";
            exit;
        }
    }
}

$converter = new TemperatureConverter();
$converter->runConverter();
