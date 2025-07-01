<?php
    $string="The beautiful thing about learning is that no one can take it away from you";
    $pattern="/learn/i";
    echo preg_match($pattern,$string)."\n";
    echo preg_match_all($pattern,$string)."\n";
    echo preg_replace($pattern,"think",$string);
?>