<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Swift_Mailer;
use Swift_SmtpTransport;

abstract class MailService
{

    abstract public function setServiceProvider();

    protected function setMailer()
    {
        $config = config('mail.mailers.'.$this->serviceProvider);
        $transport = new Swift_SmtpTransport($config['host'], $config['port'], $config['encryption']);
        $transport->setUsername($config['username']);
        $transport->setPassword($config['password']);
        Mail::setSwiftMailer(new Swift_Mailer($transport));
    }
}
