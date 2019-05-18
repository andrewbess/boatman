<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class ExceptionDivideNull extends Exception {
    public function __construct($message = 'На ноль делить нельзя!!!!!', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

class ExceptionDivideOne extends Exception {
    public function __construct($message = 'Ну такое', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

function devide($dividend, $divider)
{
    if ($divider == 0) {
        throw new ExceptionDivideNull();
    }

    if ($divider == 1) {
        throw new ExceptionDivideOne();
    }

    return $dividend / $divider;
}

for ($i = 0; $i < 20; $i++) {
    try {
        $a = rand(0, 100);
        $b = rand(0, 3);
        print_r(devide($a, $b) . '<br />');
    } catch (ExceptionDivideNull $exception) {
        print_r('Деление на ноль!!! ' . $exception->getMessage() . '<br />');
    } catch (ExceptionDivideOne $exception) {
        print_r('Деление на один!!! ' . $exception->getMessage() . '<br />');
    }
}
