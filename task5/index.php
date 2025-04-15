<?php
define('TEMPLATES_DIR', 'templates/');
define('LAYOUTS_DIR', 'layouts/');

$page = 'index';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$params = [];

switch ($page) {
    case 'index':
        $params['title'] = 'Главная';
        break;

    case 'catalog':
        $params['title'] = 'Каталог';
        $params['catalog'] = getCatalog();
        break;

    case 'about':
        $params['title'] = 'about';
        $params['phone'] = 444333;
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();

    default:
        echo "404";
        die();
}

function getCatalog() {
    return [
        [
            'name' => 'Яблоко',
            'price' => 24,
            'image' => 'apple.png'
        ],
        [
            'name' => 'Банан',
            'price' => 1,
            'image' => 'banana.png'
        ],
        [
            'name' => 'Апельсин',
            'price' => 12,
            'image' => 'orange.png'
        ],
    ];
}

function getMenu() {
    return [
        [
            'title' => 'Главная',
            'link' => '/engine1/'
        ],
        [
            'title' => 'Каталог',
            'link' => '/engine1/?page=catalog'
        ],
        [
            'title' => 'О нас',
            'link' => '/engine1/?page=about'
        ]
    ];
}

function renderMenu($menu) {
    $content = "";

    foreach ($menu as $element) {
        $content .= "<li>";

        if (isset($element['link']))
            $content .= "<a href=\"{$element['link']}\">{$element['title']}</a>";
        else 
            $content .= $element['title'];
        if (isset($element["submenu"]) && is_array($element["submenu"]) && count($element["submenu"]) > 0) {
            $content .= "<ul>";
            $content .= renderMenu($element["submenu"]);
            $content .= "</ul>";
        }

        $content .= "</li>";
    }

    return $content;
}

function render($page, $params = []) {
    return renderTemplate(LAYOUTS_DIR . 'main', [
        'title' => $params['title'],
        'menu' => renderTemplate('menu', ['menus' => renderMenu(getMenu())]), 
        'content' => renderTemplate($page, $params)
    ]);
}

function renderTemplate($page, $params = []) {
    extract($params);

    ob_start();
    include TEMPLATES_DIR . $page . ".php";
    return ob_get_clean();
}

echo render($page, $params);

?>