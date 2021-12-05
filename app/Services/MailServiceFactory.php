<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Swift_Mailer;
use Swift_SmtpTransport;

class MailServiceFactory
{
    /**
     * @throws \Exception
     */
    public static function setMailService(string|null $mailServiceProvider): MailService
    {
        return match ($mailServiceProvider) {
            "sendgrid" => new SendgridService(),
            "sparkpost" => new SparkpostService(),
            default => new MailgunService(),
        };
    }
}
