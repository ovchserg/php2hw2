<?php

namespace App\Models;

use App\Db;

class Article extends Model
{

    protected static $table = 'news';

    public $title;
    public $content;

    public static function getLast(int $count): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . self::$table . ' ORDER BY `id` DESC LIMIT ' . $count;
        return $db->query($sql, [], self::class);
    }

}