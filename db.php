<?php
    function connect($host, $dbuser, $dbpassword, $namedb)
    {
        $db = new PDO("mysql:host=$host;dbname=$namedb", $dbuser,$dbpassword);

        try {
            $db->query('CREATE TABLE IF NOT EXISTS news (`id` INT NOT NULL AUTO_INCREMENT , `Title` varchar(50) NOT NULL , `Content` varchar(50) NOT NULL , `Author` varchar(500) NOT NULL , `Img_Path` varchar(500) NOT NULL , `Date` timestamp NOT NULL,PRIMARY KEY (`id`)) ENGINE = InnoDB');

            $db->query('CREATE TABLE IF NOT EXISTS panel ( `id` INT NOT NULL AUTO_INCREMENT , `login` VARCHAR(256) NOT NULL , `password` VARCHAR(256) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;');

            return $db;
        }
        catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
?>