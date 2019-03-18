<?php

namespace App;

class Config
{

    protected static $conf;

    public $data;

    protected function __construct()
    {
        $this->data = require __DIR__ . '/../config.php';
    }

    public static function instance()
    {
        if (null === self::$conf) {
            self::$conf = new self;
        }
        return self::$conf;
    }
}