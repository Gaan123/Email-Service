<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Swift_Mailer;
use Swift_SmtpTransport;

class SparkpostService extends MailService
{
    protected $serviceProvider='sparkpost';
    public function setServiceProvider()
    {
        $this->setMailer($this->serviceProvider);
    }
}
