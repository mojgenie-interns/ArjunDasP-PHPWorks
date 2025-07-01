<?php
    class DarthVader
    {
        function __construct()
        {
            echo "I am your father!\n";
        }
    }

    class LukeSkywalker extends DarthVader
    {
        function __construct()
        {
            parent::__construct();
            echo "Noo!!\n";
        }
    }

    $dialogue2=new LukeSkywalker();
?>