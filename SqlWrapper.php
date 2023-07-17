<?php
    class SQLWrapper {
        private $connection;

        function __construct() {
            $this->connection = new MySQLi("localhost", "root", "root");
        }

        function query($query) {
            return $this->connection->query($query);
        }
    }
?>