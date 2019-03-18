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

    public function insert()
    {

        $props = get_object_vars($this);

        $fields = [];
        $binds = [];
        $data = [];

        foreach ($props as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $fields[] = $name;
            $binds[] = ':' . $name;
            $data[':' . $name] = $value;
        }
        $sql = 'INSERT INTO ' . static::$table .
            ' (' . implode(',', $fields) . ') 
            VALUES 
            (' . implode(', ', $binds) . ')';

        $db = new Db();
        $db->execute($sql, $data);
        $this->id = $db->getLastId();

    }

    public function update()
    {

        $props = get_object_vars($this);

        $binds = [];
        $data = [];

        foreach ($props as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $binds[] = $name . ' = :' . $name;
            $data[':' . $name] = $value;
        }
        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(',', $binds) . '
            WHERE id = ' . $this->id;

        $db = new Db();
        $db->execute($sql, $data);

    }

    public function save()
    {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    public function delete()
    {
        $db = new Db();
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id = :id';
        $data[':id'] = $this->id;
        $db->execute($sql, $data);
    }
}
