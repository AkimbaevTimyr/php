<?php

namespace wfm;

class ErrorHandler
{
    public  function __construct()
    {
        if(DEBUG){
            error_reporting(-1);
        }else{
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
        set_error_handler([$this, 'errorHandler']);
        ob_start();
        // после завершения функции конструктора будет вызвана register_shutdown_function
        register_shutdown_function([$this, 'fatalErrorHandler']);
    }


    public function errorHandler($errno, $errstr, $errfile, $errline): void
    {
        $this->logError($errstr, $errfile, $errline);
        $this->displayError($errno, $errstr, $errfile,  $errline);
    }

    public function fatalErrorHandler(): void
    {
        $error = error_get_last();
        if (!empty($error) && $error['type'] & ( E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR))
        {
            $this->logError($error['message'], $error['file'], $error['line']);
            ob_end_clean();
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        }else {
            // отправка (вывод) буфера и его отключение
            ob_end_flush();
        }
    }

    public function exceptionHandler(\Throwable $e): void
    {
       $this->logError($e->getMessage(), $e->getFile(), $e->getLine());
       $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function logError($message = '', $file = '', $line = ''): void
    {
        //Если есть ошибка то получаем ее и записываем в файл
        file_put_contents(LOGS . '/errors.log',
            "[" .date('Y-m-d H:i:s') . "] Текст ошибки: {$message} | Файл: {$file} | Строка: {$line}\n=================\n",
                FILE_APPEND
        );
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $responce = 500): void
    {
        if($responce == 0){
            $responce = 404;
        }
        //отправляем код ответы в заголовке
        http_response_code($responce);
        //если ошибка 404 и выключен дебаг мод то отправляем 404 страницу
        if($responce == 404 && !DEBUG){
            require WWW . '/errors/404.php';
            die;
        }
        //если дебаг выключен
        if(DEBUG) {
            require WWW . '/errors/development.php';
        }else{
            require WWW . '/errors/production.php';
        }
        //die завершаем выполнение скрипта
        die;
    }
}