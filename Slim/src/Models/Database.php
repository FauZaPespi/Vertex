<?php

namespace Fauza\Template\Models;

class Database
{
    private static ?\PDO $pdo = null;

    public static function db(): \PDO
    {
        if (Database::$pdo === null) {
            $host = '127.0.0.1';
            $db = 'lenddb';
            $user = 'lenduser';
            $pass = 'lendsecret';
            $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ];

            try {
                Database::$pdo = new \PDO($dsn, $user, $pass, $options);
            } catch (\PDOException $e) {
                echo "Erreur connexion DB : " . $e->getMessage();
                exit;
            }
        }
        return Database::$pdo;
    }

    public static function run(string $sql, ?array $params = null)
    { 
        $stmt = Database::db()->prepare($sql);
        //if (array_count_values($params) <= 0) {
       //     $stmt->execute();
        //} else {
            $stmt->execute($params);
        //}
        return $stmt;
    }
}
