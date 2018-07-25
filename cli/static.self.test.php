<?php
// Статические ссылки на текущий класс, такие как self:: или __CLASS__, вычисляются используя класс, к которому эта функция принадлежит, как и в том месте, где она была определена:

class A
{
    public static function who()
    {
        echo __CLASS__;
    }
    public static function test()
    {
        self::who();
    }
}

class B extends A
{
    public static function who()
    {
        echo __CLASS__;
    }
}

B::test(); // Результат выполнения данного примера: A
