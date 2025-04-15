<?php

$regionsAndCities = [];

$regionsAndCities["Московская область"] = ["Москва", "Зеленоград", "Клин", "Красногорск", "Королёв"];
$regionsAndCities["Ленинградская область"] = ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"];
$regionsAndCities["Рязанская область"] = ["Рязань", "Михайлов", "Сасово", "Касимов", "Скопин", "Спас-Клепики"];
$regionsAndCities["Тюменская область"] = ["Тюмень", "Тобольск", "Ялуторовск"];

foreach ($regionsAndCities as $region => $cities) {
    echo $region . ":" . "<br>";
    echo implode(", ", $cities) . ".";
    echo "<br><br>";
}

?>