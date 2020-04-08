<?php

namespace Marcelo\Database;
    abstract class Connection
    {
        private static $conn;

        public static function getConn()
        {
            if (!self::$conn) {
                self::$conn = new \PDO('mysql: host=localhost; dbname=site_estudo', 'root','');
            }

            return self::$conn;
        }
    }