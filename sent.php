<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
    
        echo "<pre>";
        // var_dump($_FILES);
        echo "<pre>";
        echo $_POST['name'];echo'<br>';
        echo $_POST['mail'];echo'<br>';
        echo $_POST['phone'];echo'<br>';
        echo $_POST['login'];echo'<br>';
        echo $_POST['password'];echo'<br>';
        
        // Проверяем, была ли загружена файла
        if (isset($_FILES['file'])) {
            $fileType = $_FILES["file"]["type"];
            $uploadDir = 'E:/OSPanel/home/lwsssen/public/'; // Полный путь к папке для сохранения файла
            $uploadFilePath = $uploadDir . basename($_FILES['file']['name']); // Полный путь к загружаемому файлу
        
            // Проверка типа файла
            if ($fileType == "image/jpeg" || $fileType == "image/png") {
                // Пытаемся переместить загруженный файл
                if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)) {
                    echo "<h2>Файл успешно загружен и сохранен в папку 'E:/OSPanel/home/lwsssen/public/'.</h2>";
                    printf("<i>имя файла:</i> <b>%s</b> <p>
                    <i>Размер файла:</i> <b>%s</b> байт <p>
                    <i>Тип содержимого файла:</i> <b>%s</b> <p>
                    <i>Имя временного файла:</i> <b>%s</b> <p>
                    <i>Код ошибки:</i> <b>%s</b>",
                    $_FILES['file']['name'],
                    $_FILES['file']['size'],
                    $fileType,
                    $_FILES['file']['tmp_name'],
                    $_FILES['file']['error']);
                } else {
                    echo "<h3>Не удалось сохранить файл. Попробуйте снова.</h3>";
                }
            } else {
                echo "<h3>Допустимые форматы: JPEG или PNG!</h3>";
            }
        } else {
            echo "<h3>Заполните, пожалуйста, форму!</h3>";
        }
       
        ?>
    </div>
</body>
</html>