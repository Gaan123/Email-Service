
# Email Service




###endpoint
/api/v1/send-mail
###body
- **mail_provider**: (optional,providers["sendgrid","mailgun:defalut"]) 
- **to**: (required,email) 
- **subject**: (required,string) 
- **body**: (required,string) 

##project description
###**Focused on**  
Focuses on Backend 

###**Frameworks used**  
**Laravel**  
Choose laravel because I am familiar wit it and use it on regular basis. I used the factory pattern.  I have used try catch in case of failure there might have other way to do it, but I couldn't able to find it. I might have used reflection api to instantiate mailService dynamically since I have used few  providers only I choose to instantiate in code


**My codes**
app/Http/Controllers/Api/V1/EmailController  
App/Http/Requests/SendMailRequest  
App/Mail/SendMail  
App/Services/MailgunService  
App/Services/MailService  
App/Services/MailServiceFactory  
App/Services/SparkpostService  
App/Services/SendgridService  
Tests/Feature/EmailApiTest;  



##Social Link
- **[Linkedin](https://www.linkedin.com/in/gagan-gurung-22496710b/)**

