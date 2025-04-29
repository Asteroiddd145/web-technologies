<?php
    include "log.php";
    include "loadGallery.php";
    include "uploadPhoto.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Галерея</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <section class="images">
            <?= getGallery(); ?>
        </section>
        <form method="post" enctype="multipart/form-data">
            <label for="file">Выберите изображение для загрузки (не более 5 Мб):</label><br>
            <input type="file" name="file" required><br>
            <button type="submit">Загрузить</button>
            <p class="status"><?= $message ?></p>
        </form>
    </main>
</body>
</html>