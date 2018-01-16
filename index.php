<?php
    // Файл с данными телефонной книги в формате json:
    $jsonPhonebook = 'phonebook.json';

    // Файл с заголовками телефонной книги в формате json:
    $jsonPhonebookHeaders = 'headers.json';

    // Записываем в переменные содержимое файлов:
    $jsonPhonebookData = file_get_contents($jsonPhonebook);
    $jsonHeadersData = file_get_contents($jsonPhonebookHeaders);

    // Преобразовываем данные из переменных в формат массивов:
    $phoneBookArray = json_decode($jsonPhonebookData, false);
    $headersArray = json_decode($jsonHeadersData, false);

    // Объединяем массив заголовков и массив данных:
    $dataArray = array_merge($headersArray, $phoneBookArray);
?>

<!DOCTYPE html>
<html>
    <title>Телефонная книга</title>
    <meta charset='utf-8'>
    <style>
        table {
            border-collapse: collapse;
        }
        tr:first-child {
            text-align: center;
            font-weight: 700;
            background-color: darkgray;
        }
        td {
            padding: 5px 10px;
            border: 2px solid black;
        }
    </style>
    <body>
        <table>
            <? foreach ($dataArray as $key => $array) { ?>
                <tr>
                    <td><?= $dataArray[$key] -> {'firstName'} ?></td>
                    <td><?= $dataArray[$key] -> {'lastName'} ?></td>
                    <td><?= $dataArray[$key] -> {'address'} ?></td>
                    <td><?= $dataArray[$key] -> {'phoneNumber'} ?></td>
                </tr>
            <? } ?>
        </table>
    </body>
</html>
