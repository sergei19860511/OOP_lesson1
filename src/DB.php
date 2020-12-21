<?php

namespace MyApp;

class DB
{
    public const TABLE_GOODS = 'goods';
    private $link;

    public function getTableDataCount($tableName)
    {
        try {
            return $this->link
                ->query("SELECT COUNT(*) FROM {$tableName}")
                ->fetchColumn();
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function getLink(): \PDO
    {
        return $this->link;
    }

    public function getTableDataPart($tableName, int $from, int $limit)
    {
        try {
            return $this->link
                ->query("SELECT * FROM {$tableName} LIMIT {$from},{$limit}")
                ->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function getTableData($tableName)
    {
        try {
            return $this->link
                ->query("SELECT * FROM {$tableName}")
                ->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function getById($tableName, $id)
    {
        try {
            return $this->link
                ->query("SELECT * FROM {$tableName} WHERE id = " . (int)$id)
                ->fetch(\PDO::FETCH_ASSOC);
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function __construct($config)
    {
        try {
            $this->link = new \PDO(
                $config['dsn'],
                $config['user'],
                $config['pass']
            );
        } catch (\PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }
    }
}
