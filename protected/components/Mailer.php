<?php
/**
 * Created by JetBrains PhpStorm.
 * User: allash
 * Date: 07.01.13
 * Time: 17:53
 * To change this template use File | Settings | File Templates.
 */
class Mailer
{

    public function newMail($contacts, $theme, $bodyText)
    {
        $_SmtpHost = 'mailout.one.com';
        $_SmtpLogin = '';
        $_SmtpPassword = ''; //если нужно
        $_SmtpPort = 25; // порт
        $_From = array(
            'test@example.com'=>'Vasiliy Pupkin'  // формат контактов From: и To:
        );

        $SM = Yii::app()->swiftMailer;

        $Transport = $SM->smtpTransport($_SmtpHost, $_SmtpPort)
            ->setUsername($_SmtpLogin)
            ->setPassword($_SmtpPassword);

        $Mailer = $SM->mailer($Transport);

        $Message = $SM
            ->newMessage($theme)
            ->setFrom($_From)
            ->setTo($contacts)
            ->addPart($bodyText, 'text/html')
            ->setBody($bodyText);

        return $Mailer->send($Message);
    }
}