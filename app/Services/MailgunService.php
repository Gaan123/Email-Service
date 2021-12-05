<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Swift_Mailer;
use Swift_SmtpTransport;

class MailgunService extends MailService
{
    protected $serviceProvider='smtp';
    public function setServiceProvider()
    {
        $this->setMailer($this->serviceProvider);
    }
}
