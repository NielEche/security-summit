<?php 
    require_once './vendor/autoload.php';

    //Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('allinformations2020@gmail.com')
    ->setPassword('ourfdkruiczsnthv');

    //Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    function sendVerificationEmail($email)
    {
        global $mailer;
        $body = '<!-Doctype html>
        <html lang="en">
            <head> 
                <meta charset="UTF-8">
                <title>Test Mail</title>
                <style>
                    .wrapper {
                        padding: 20px;
                        color: #444;
                        font-size:1.3em;
                    }

                    p{
                        font-size:1.4em;
                    } 
                    a {
                        background: #001C73;
                        text-decoration: none;
                        color:#fff;
                        padding:10px;
                    }
                </style>
            </head>

            <body>
                <div class="wrapper">
                    <img src="http://ss20.meshdesignstudios.com/images/bg/rss20email.png" alt="event image">
                    <h1>Rivers State Security Summit 2020</h1>
                    <p>Thank you for Registering. Cant wait to see you at the summit</p>
                    <a href="ss20.meshdesignstudios.com">Go to site !</a>
                </div>
            </body>
        </html>';

    //Create the message
    $message = (new Swift_Message('Security Saummit 2020'))
    ->setFrom('allinformations2020@gmail.com')
    ->setTo($email)
    ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }

    }
?>

