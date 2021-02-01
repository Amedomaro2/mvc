<?php


namespace App\Utils;


class Config
{
    public function get()
    {
        $data = file_get_contents(__DIR__ . '/../../code.txt');
        $db = json_decode($data, 1);
        return $db;
    }
}