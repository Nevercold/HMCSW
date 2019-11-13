<?php
/**
 * Copyright (c) 2019 Moritz Walter
 * All rights reserved.
 *
 * File created on 13.11.2019 at 17:9
 */

// mysql login data
define('mysql-ip', '');
define('mysql-user', '');
define('mysql-pw', '');
define('mysql-db', '');

try {
    $pdo = new PDO('mysql:host=' . mysql-ip . ';charset=utf8;dbname=' . mysql-db, mysql-user, mysql-pw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('No connection to DB');
}
