<?php

$alphabet = [
    "а" => "a",
    "б" => "b",
    "в" => "v",
    "г" => "g",
    "д" => "d",
    "е" => "e",
    "ё" => "yo",
    "ж" => "zh",
    "з" => "z",
    "и" => "i",
    "й" => "y",
    "к" => "k",
    "л" => "l",
    "м" => "m",
    "н" => "n",
    "о" => "o",
    "п" => "p",
    "р" => "r",
    "с" => "s",
    "т" => "t",
    "у" => "u",
    "ф" => "f",
    "х" => "kh",
    "ц" => "ts",
    "ч" => "ch",
    "ш" => "sh",
    "щ" => "shch",
    "ъ" => "",
    "ы" => "y",
    "ь" => "",
    "э" => "e",
    "ю" => "yu",
    "я" => "ya",
];

function transliteration($string) {
    global $alphabet;
    $result = "";
    for ($i = 0; $i < mb_strlen($string); $i++) {
        $char = mb_strtolower(mb_substr($string, $i, 1, "UTF-8"));
        if (array_key_exists($char, $alphabet))
            $result .= $alphabet[$char];
        else 
            $result .= $char;
    }
    return $result . "<br>";
}

echo transliteration("я");
echo transliteration("код");
echo transliteration("слово");
echo transliteration("строка");
echo transliteration("процессор");
echo transliteration("университет");
echo transliteration("утилитарный");
echo transliteration("конвергенция");
echo transliteration("транспарентный");
echo transliteration("многофункциональный");

echo "<br>" . transliteration("КОНЕЧНЫЙ АВТОМАТ — математическая абстракция, модель дискретного устройства, имеющего один вход, один выход и в каждый момент времени находящегося в одном состоянии из множества возможных.");

?>