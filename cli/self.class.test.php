<?php

class Model
{
    public static $table = 'table';

    public static function getTable()
    {
        return self::$table;
    }
}

echo Model::getTable(); // Результат выполнения данного примера: 'table'
