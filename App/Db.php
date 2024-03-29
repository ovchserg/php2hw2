<?php

namespace App;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $config = Config::instance()->data['db'];
        $this->dbh = new \PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['user'], $config['password']);
    }

    public function query(string $query, array $params = [], $class = null): array
    {
        $sth = $this->dbh->prepare($query);
        $sth->execute($params);
        if (null === $class) {
            $sth->setFetchMode(\PDO::FETCH_ASSOC);
        } else {
            $sth->setFetchMode(\PDO::FETCH_CLASS, $class);
        }
        return $sth->fetchAll();
    }

    public function execute(string $query, array $params = []): bool
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }

}