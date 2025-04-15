<?php

$regionsAndCities = [];

$regionsAndCities["Московская область"] = ["Москва", "Зеленоград", "Клин", "Красногорск", "Королёв"];
$regionsAndCities["Ленинградская область"] = ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"];
$regionsAndCities["Рязанская область"] = ["Рязань", "Михайлов", "Сасово", "Касимов", "Скопин", "Спас-Клепики"];
$regionsAndCities["Тюменская область"] = ["Тюмень", "Тобольск", "Ялуторовск"];

function printCities($letter) {
    global $regionsAndCities;
    foreach ($regionsAndCities as $region => $cities) {
        echo $region . ":" . "<br>";
        $filteredCities = filterCitiesByFirstLetter($cities, $letter);
        $output = count($filteredCities) > 0 ? implode(", ", $filteredCities) : "нет";
        echo "Города на букву {$letter}: {$output}.";
        echo "<br><br>";
    }
}

function filterCitiesByFirstLetter($cities, $letter) {
    $result = [];
    foreach ($cities as $city) {
        if (mb_substr($city, 0, 1) == $letter)
            $result[] = $city;
    }
    return $result;
}

echo printCities("К");
echo "<br><br><br>";
echo printCities("С");

?>