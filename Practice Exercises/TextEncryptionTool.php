<?php

class TextEncryptionTool //Ceaser cipher
{
    private string $text;

    public function __construct()
    {
        $this->text = readline("\nEnter the text: ");
    }

    public function encryption()
    {
        echo "Encrypted text = ";
        $encrypted = '';
        foreach (str_split($this->text) as $char) {
            if (ctype_alpha($char)) {
                $ascii = ord($char);
                $offset = ctype_upper($char) ? 65 : 97;
                $encrypted .= chr(($ascii - $offset + 3) % 26 + $offset);
            } else {
                $encrypted .= $char;
            }
        }
        echo $encrypted . PHP_EOL;
    }

    public function decryption()
    {
        echo "Decrypted text = ";
        $decrypted = '';
        foreach (str_split($this->text) as $char) {
            if (ctype_alpha($char)) {
                $ascii = ord($char);
                $offset = ctype_upper($char) ? 65 : 97;
                $decrypted .= chr(($ascii - $offset - 3 + 26) % 26 + $offset);
            } else {
                $decrypted .= $char;
            }
        }
        echo $decrypted;
    }
}

$text1 = new TextEncryptionTool();
$text1->encryption();

$text2 = new TextEncryptionTool();
$text2->decryption();
