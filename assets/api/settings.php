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
    return true;
}

function getsetting(PDO $pdo, $settingkey){
    $statement = $pdo->prepare("SELECT ".$settingkey." FROM setting WHERE key = ? LIMIT 1");
    $statement->execute(array($settingkey));
    if($statement->execute()) {
        if ($statement->rowCount() == 1) {
            while ($row = $statement->fetch()) {
                return $row['value'];
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

