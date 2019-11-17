<?php
/**
 * Copyright (c) 2019 Moritz Walter
 * All rights reserved.
 *
 * File created on 17.11.2019 at 10:24
 */

namespace HMCSW\Main;


class main
{
    public function getsetting($key, $pdo)
    {
        $statement = $pdo->prepare("SELECT * FROM setting WHERE settingkey = ? LIMIT 1");
        $statement->execute(array($key));
        $count = $statement->rowCount();
        if ($count == 1) {
            while ($row = $statement->fetch()) {
                return $row['value'];
            }
        } else {
            return false;
        }
    }

    public function blockedmail($email, $pdo)
    {
        $statement = $pdo->prepare("SELECT * FROM blockedmail WHERE email = ? LIMIT 1");
        $statement->execute(array($email));
        $count = $statement->rowCount();
        if ($count == 1) {
            return true;
        } else {
            return false;
        }
    }


    public function sendnotification($usertoken, $notification, $pdo, $m, $info)
    {
        $statement = $pdo->prepare("SELECT * FROM accounts WHERE usertoken = ?");
        $statement->execute(array($usertoken));
        while ($row = $statement->fetch()) {
            $email = $row['email'];
            $nickname = $row['nickname'];
        }
        $statement = $pdo->prepare("SELECT * FROM notification WHERE tag = ?");
        $statement->execute(array($notification));
        while ($row = $statement->fetch()) {
            $title = $row['title'];
            $text = $row['message'];
            $id = $row['id'];
        }
        $info = json_decode($info);


        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = $m->getsetting("mailhost", $pdo);
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->SMTPAuth = $m->getsetting("mailsmtpauth", $pdo);
            $mail->Username = $m->getsetting("mailusername", $pdo);
            $mail->Password = $m->getsetting("mailpassword", $pdo);
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom($m->getsetting("mailusername", $pdo), $m->getsetting("name", $pdo));
            $mail->addAddress($email, $nickname);
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body = nl2br($text);
            $mail->AltBody = $text;
            $mail->send();
        } catch (Exception $e) {
        }




    }
}