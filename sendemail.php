<?php

require 'vendor/autoload.php';

class SendEmail
{

    public static function SendMail($to, $subject, $content)
    {
        $key = 'your.sendgridKeyGoesHere123';

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("your@email.com", "INITIALS");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/plain", $content);

        $sendgrid = new \SendGrid($key);

        try {
            $response = $sendgrid->send($email);
            return $response;
        } catch (Exception $e) {
            echo 'Email exception caught: ' . $e->getMessage() . "\n";

        }
    }
}
?>