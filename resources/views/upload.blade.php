
<?php

//require_once 'vendor/composer/autoload_files.php';

use Smalot\PdfParser\Parser;

// Проверяем, был ли файл загружен через POST запрос
//if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['pdfFile'])) {
  //  $file = $_FILES['pdfFile'];

    // Проверяем, нет ли ошибок при загрузке
    if ($file['error'] === UPLOAD_ERR_OK) {
        $tmpName = $file['tmp_name'];
        $parser = new Parser();

        try {
            // Парсим PDF файл
            $pdf = $parser->parseFile($tmpName);
            $text = $pdf->getText();

            // Делим текст на билеты, если билеты разделены каким-то образом
            $tickets = preg_split('/Билет \d+/', $text);

            // Удаляем первый пустой элемент, если он есть
            if (empty($tickets[0])) {
                array_shift($tickets);
            }

            // Выводим результат
            echo "<h1>Результаты парсинга</h1>";
            foreach ($tickets as $index => $ticket) {
                echo "<h2>Билет " . ($index + 1) . "</h2>";
                echo "<pre>" . htmlentities(trim($ticket)) . "</pre><hr>";
            }
        } catch (Exception $e) {
            echo "<p>Ошибка при парсинге файла: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p>Ошибка при загрузке файла: " . $file['error'] . "</p>";
    }
//} else {
  //  echo "<p>Файл не был загружен через форму.</p>";
//}
