<?php

function power($val, $pow) {
    return $pow == 0 ? 1 : $val * power($val, --$pow);
}

echo power(2, 10) . "\n";
echo power(3, 2)  . "\n";
echo power(7, 3)  . "\n";

?>