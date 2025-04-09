<?php

/* 1 способ */
// include("task5_year.php");

/* 2 способ */
/* преобразование файла в текст, подойдёт только если в файле содержится исключительно дата */
// $content = file_get_contents("task5_year.php");
// echo $content;

/* 3 способ */
// function renderTemplate($page) {
//     ob_start();
//     include $page . ".php";
//     return ob_get_clean();
// }
// $content = renderTemplate("task5_year");
// echo $content;

?>