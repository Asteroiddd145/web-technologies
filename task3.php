<?php

function addition($a, $b) {
    return $a + $b;
}

function subtraction($a, $b) {
    return $a - $b;
}

function multiplication($a, $b) {
    return $a * $b;
}

function division($a, $b) {
    return $b != 0 ? $a / $b : "Error";
}

echo addition(16, 2) . "\t";
echo subtraction(16, 2) . "\t";
echo multiplication(16, 2) . "\t";
echo division(16, 2) . "\t";

?>