<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendMailRequest;
use App\Mail\SendMail;
use App\Services\MailServiceFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendMail(SendMailRequest $request)
    {

        $data=$request->only([
            'subject',
            'body',
        ]);
        try {
            $serviceProvider = MailServiceFactory::setMailService($request->mail_provider);
            $serviceProvider->setServiceProvider();
            $this->mail($request->to,$data);
            return response(['message' =>'Your mail has been sent']);
        }catch(\Exception $e){
            $serviceProvider = MailServiceFactory::setMailService($request->mail_provider!=='sendgrid'?"sendgrid":"mailgun");
            $serviceProvider->setServiceProvider();
            $this->mail($request->to,$data);
            return response(['message' =>'Your mail has been sent']);
        }catch(\Exception $e){
            return response(['message' =>$e->getMessage()]);
        }
    }

    private function mail($to,array $data)
    {
        Mail::to($to)->send(new SendMail($data));
    }
}
