<?php

declare(strict_types=1);

class Mailer
{
    public function sendEmail(string $recipient, string $subject, string $message): bool
    {
        echo "Sending email...";

        sleep(3);

        return true;
    }

}