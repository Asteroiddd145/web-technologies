<?php

ob_start();
include 'task3.php';
ob_end_clean();

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case "addition":
            return addition($arg1, $arg2);
        case "subtraction": 
            return subtraction($arg1, $arg2);
        case "multiplication":
            return multiplication($arg1, $arg2);
        case "division": 
            return division($arg1, $arg2);
        default:
            return "Error";
    }
}

echo mathOperation(8, 8, "multiplication");

?>