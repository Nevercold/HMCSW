<?php
/**
 * Copyright (c) 2019 Moritz Walter
 * All rights reserved.
 *
 * File created on 17.11.2019 at 10:24
 */

use ReCaptcha\ReCaptcha;

include __DIR__ . '/../../system/load.php';
if (isset($_POST['register-start'])) {
    $recaptcha = new ReCaptcha($m->getsetting(recaptchasecret, $pdo));
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $emailend = substr(strrchr($email, '@'), 1);
    if ($m->blockedmail($emailend, $pdo)) {
        header('Location: ?register&error=5');
        die();
    }

    $usertoken = substr(str_shuffle(str_repeat($x = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', ceil($m->getsetting(usertoken - lenght, $pdo) / strlen($x)))), 1, $m->getsetting(usertoken - lenght, $pdo));
    $password = password_hash($password . PEPPER, PASSWORD_BCRYPT, [
        'cost' => COST
    ]);

    $statement = $pdo->prepare("INSERT INTO accounts ($usertoken, $email, $password) VALUES (?, ?, ?)");
    $statement->execute(array($usertoken, $email, $password));

}