<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Swift_Mailer;
use Swift_SmtpTransport;

class SendgridService extends MailService
{
    protected $serviceProvider='sendgrid';
    public function setServiceProvider()
    {
        $this->setMailer($this->serviceProvider);
    }
}
