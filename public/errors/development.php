<?php

/*
    @var $errno \wfm\ErrorHandler
    @var $errstr \wfm\ErrorHandler
    @var $errfile \wfm\ErrorHandler
    @var $errline \wfm\ErrorHandler
*/

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Error</title>
    </head>
        <body>
        <h1>Произошла ошибка</h1>

        <p><b>Код ошибки <?= $errno ?></b></p>
        <p><b>Текс ошибки  <?= $errstr ?></b></p>
        <p><b>Файл в котором ошибка <?= $errfile ?></b></p
        <p><b>Строк в котрой ошибка <?= $errline ?></b></p>
    </body>
</html>

