<?php

$year = date("Y");
$title = "Текущий год";

function template($value) {
    return "{{ " . $value . " }}";
}

$content = file_get_contents("year_view.php");
$content = str_replace(template("title"), $title, $content);
$content = str_replace(template("year"), $year, $content);

echo $content;

?>