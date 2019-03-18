<?php

namespace App\Models;

use App\Db;

abstract class Model
{

    protected static $table = '';

    public $id;

    public static function findAll(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql, [], static::class);
    }

    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
        $res = $db->query($sql, [':id' => $id], static::class);

        if(1 === count($res)){
            return reset($res);
        }

        return false;
    }

}
