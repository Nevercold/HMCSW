<?php
/**
 * Copyright (c) 2019 Moritz Walter
 * All rights reserved.
 *
 * File created on 10.8.2019 at 7:47
 */

define('mysql-ip', '');
define('mysql-user', '');
define('mysql-pw', '');
define('mysql-db', '');

try {
    $pdo = new PDO('mysql:host=' . mysql-ip . ';charset=utf8;dbname=' . mysql-db, mysql-user, mysql-pw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Datenbank Verbindung fehlgeschlagen.');
}
