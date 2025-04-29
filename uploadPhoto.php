<?php

include_once "ImageResize.php";
use \Gumlet\ImageResize;

$message = "";

$messageTypes = [
    "ok" => "Файл загружен",
    "error" => "Ошибка загрузки",
    "extension" => "Расширение не поддерживается",
    "size" => "Размер загружаемого файла превыщает лимит",
];

$allowedExtensions = [
    "png",
    "jpg",
    "jpeg",
    "webp"
];

if (!empty($_FILES)) {
    $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    if (in_array($extension, $allowedExtensions)) {
        $size = $_FILES["file"]["size"];
        if ($size < 5 * 1024 * 1024) {
            $fileName = pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
            $tmpName = $_FILES["file"]["tmp_name"];

            $bigPath = "images/big/{$fileName}.jpg";
            $smallPath = "images/small/{$fileName}.jpg";

            try {
                $bigImage = new ImageResize($tmpName); // чтобы сохранить с расширением jpg
                $bigImage->save($bigPath, IMAGETYPE_JPEG);

                $smallImage = new ImageResize($bigPath);
                $smallImage->crop(300, 300);
                $smallImage->save($smallPath, IMAGETYPE_JPEG);

                $message = "ok";
            } catch (Exception $e) {
                $message = "error";
            }
        } else {
            $message = "size";
        }
    } else {
        $message = "extension";
    }
    
    header("Location: index.php?status=$message");
    die();
}

if (!empty($_GET['status'])) {
    $message = $messageTypes[$_GET['status']];
}

?>