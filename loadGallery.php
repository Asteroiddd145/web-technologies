<?php

function getGallery() {
    $images = array_slice(scandir("images/small/"), 2);
    $output = "";

    foreach ($images as $image) {
        $small = "images/small/" . $image;
        $big = "images/big/" . $image;
        $output .= renderImage($small, $big);
    }

    return $output;
}

function renderImage($smallImage, $bigImage) {
    return "
        <a href=\"$bigImage\" target=\"_blank\">
            <img src=\"$smallImage\">
        </a>
    ";
}

?>