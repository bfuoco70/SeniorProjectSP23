<?php
    $lines = file("Resources/loot.txt");
    foreach ($lines as $line)
    {
        $tokens = explode($line, ":");
        list($item, $value) = $tokens;
        echo "$item has a value of $value";
    }