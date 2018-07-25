<?php

// В объектной модели PHP существует возможность задавать свойства и методы не только для объектов — экземпляров класса, но и для класса в целом. Для этого тоже служит ключевое слово static:

class A
{
    public static $x = 'foo';
    public $id = 42;

    public static function test()
    {
        return 42;
    }
    static public function foo()
    {
        echo $this->id; // [php] $this can not be used in static methods.
    }

}

echo A::$x; // 'foo'

echo A::test(); // 42

$a = new A;
$a->foo();

// (получите «Fatal error: Using $this when not in object context»)
