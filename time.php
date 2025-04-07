<?php

$hours = date("H");
$minutes = date("i");

$title = "Время";

function template($value) {
    return "{{ " . $value . " }}";
}

// $type: true - hours, false - minutes
function formatter($value, $type) {
    $result = "";
    
    $n = $value % 10;
    $n100 = $value % 100;

    if ($n100 >= 11 && $n100 <= 14) 
        $result = $type ? "часов" : "минут";  
    elseif ($n == 1)
        $result = $type ? "час" : "минута";
    elseif ($n >= 2 && $n <= 4)
        $result = $type ? "часа" : "минуты";    
    else
        $result = $type ? "часов" : "минут";
    
    return $value . " " . $result;
}

$content = file_get_contents("time_view.php");
$content = str_replace(template("title"), $title, $content);
$content = str_replace(template("hours"), formatter($hours, true), $content);
$content = str_replace(template("minutes"), formatter($minutes, false), $content);

echo $content;

?>