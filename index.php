<?php

//assert(true);
//assert(false);


//Создать интерфейс Operation с методом calculate. Создать классы имплементирующие
//этот инетрфейс (Plus, Minus, Mult, Div), каждый класс в конструктор принимает 2 числа
//и каждый класс реализует метод calculate по-своему. Создайте класс Calculator устроенный
//согласно шаблону Fluent interface. Сделайте так, чтобы код из примера заработал.
//Допишите своих тестов.


interface Operation
{
    public function calculate();
}

class Plus implements Operation
{
    public int $n1;
    public int $n2;

    function __construct($n1, $n2)
    {
        $this->n1 = $n1;
        $this->n2 = $n2;
    }

    public function calculate(): int
    {
        return $this->n1 + $this->n2;
    }
}

class Minus implements Operation
{
    public int $n1;
    public int $n2;
    function __construct($n1, $n2)
    {
        $this->n1 = $n1;
        $this->n2 = $n2;
    }

    public function calculate(): int
    {
        return $this->n1 - $this->n2;
    }
}

class Mult implements Operation
{
    public int $n1;
    public int $n2;
    function __construct($n1, $n2)
    {
        $this->n1 = $n1;
        $this->n2 = $n2;
    }

    public function calculate(): int
    {
        return $this->n1 * $this->n2;
    }
}

class Div implements Operation
{
    public int $n1;
    public int $n2;
    function __construct($n1, $n2)
    {
        $this->n1 = $n1;
        $this->n2 = $n2;
    }

    public function calculate(): int
    {
        return $this->n1 / $this->n2;
    }
}

class Calculator
{
    public int $n1;
    public int $n2;
    public object $currentObj;

    function firstNumber($num): self
    {
        $this->n1 = $num;
        return $this;
    }

    function secondNumber($num): self
    {
        $this->n2 = $num;
        return $this;
    }

    function operation($class): self
    {
        $this->currentObj = new $class($this->n1, $this->n2);
        return $this;
    }

    function result(): int
    {
        return $this->currentObj->calculate();
    }
}

$calculator = new Calculator();
assert(
    $calculator->firstNumber(2)
        ->secondNumber(2)
        ->operation(Plus::class)
        ->result() == 4
);

assert(
    $calculator->firstNumber(10)
        ->secondNumber(4)
        ->operation(Minus::class)
        ->result() == 6
);

assert(
    $calculator->firstNumber(3)
        ->secondNumber(3)
        ->operation(Mult::class)
        ->result() == 9
);

assert(
    $calculator->firstNumber(25)
        ->secondNumber(5)
        ->operation(Div::class)
        ->result() == 5
);