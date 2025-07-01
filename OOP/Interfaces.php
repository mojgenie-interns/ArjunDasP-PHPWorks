<?php
    interface Avengers
    {
        function realName();
    }

    class CaptainAmerica implements Avengers
    {
        function realName()
        {
            echo "Steve Rogers";
        }
    }

    class IronMan implements Avengers
    {
        function realName()
        {
            echo "Tony Stark";
        }
    }

    $callCaptainAmerica=new CaptainAmerica();
    $callCaptainAmerica->realName();
