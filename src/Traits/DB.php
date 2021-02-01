<?php

namespace App\Traits;

use PDO;


trait DB
{
    private static function getDb() {
        $data= new \App\Utils\Config();
        $data=$data->get();
        
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s',
            $data[0]['DB_HOST'],
            $data[0]['DB_NAME']
        );
        $pdo = new PDO($dsn, $data[0]['DB_USER'], $data[0]['DB_PASS']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}