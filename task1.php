<?php

$a = -16;
$b = 32;

if ($a >= 0 && $b >= 0)
    echo $a - $b;
elseif ($a < 0 && $b < 0)
    echo $a * $b;
else 
    echo $a + $b;

?>