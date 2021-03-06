<?php

namespace App\Traits;

use PDO;

trait DB
{
    private static function getDb() {
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s',
            '127.0.0.1',
            'homestead'
        );
        $pdo = new PDO($dsn, 'homestead', 'secret');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}