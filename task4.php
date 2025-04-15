<?php

$menu = [
    [
        "title" => "Главная",
    ],
    [
        "title" => "Товары",
        "submenu" => [
            [
                "title" => "Видеокарты",
                "submenu" => [
                    [
                        "title" => "ASUS",
                        "submenu" => [
                            ["title" => "GTX 1060"],
                            ["title" => "RTX 2060"],
                            ["title" => "RTX 3060"],
                            ["title" => "RTX 4060"],
                            ["title" => "RTX 5060"]
                        ]
                    ],
                    ["title" => "MSI"],
                    ["title" => "KFA2"],
                    ["title" => "GIGABYTE"],
                    ["title" => "Palit"],
                    ["title" => "Sapphire"]
                ],
            ],
            [
                "title" => "Процессоры",
                "submenu" => [
                    ["title" => "AMD"],
                    ["title" => "Intel"]
                ]
            ],
            [
                "title" => "Материнские платы",
            ]
        ]
    ],
    [
        "title" => "О нас",
    ]
];

function renderMenu($menu) {
    $content = "";

    foreach ($menu as $element) {
        $content .= "<li>";

        $content .= $element["title"];
        if (isset($element["submenu"]) && is_array($element["submenu"]) && count($element["submenu"]) > 0) {
            $content .= "<ul>";
            $content .= renderMenu($element["submenu"]);
            $content .= "</ul>";
        }

        $content .= "</li>";
    }

    return $content;
}

echo "<ul>" . renderMenu($menu) . "</ul>";

?>