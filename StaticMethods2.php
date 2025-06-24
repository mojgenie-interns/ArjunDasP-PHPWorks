<?php
    class Father
    {
        static function fatherName()
        {
            echo "DASAN";
        }
        function callSelf()
        {
            echo self::father();
        }
    }

    class Son extends Father
    {
        function callFather()
        {
            echo parent::fatherName();
        }
    }

    class Mother
    {
        function callHusband()
        {
            echo Father::fatherName();
        }
    }


    // $father1=new Father();
    // $member1->callFather();
    // $member1->father();
    // echo Family::father();
    // $son1=new Son();
    // $son1->callFather();
    $lady1=new Mother();
    $lady1->callHusband();
?>