<?php
/**
 * Copyright (c) 2019 Moritz Walter
 * All rights reserved.
 *
 * File created on 10.8.2019 at 7:46
 */

function setsetting(PDO $pdo, $settingkey, $settingvalue){
    $statement = $pdo->prepare("UPDATE setting SET value = ? WHERE key = ?");
    $statement->execute(array($settingvalue, $settingkey));
}

