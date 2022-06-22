<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if(isset($_POST['submit']))
{
    $sujet = htmlspecialchars($_POST['message']);
    $nom = htmlspecialchars($_POST['lastname']);
    $message = htmlspecialchars($_POST['message']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPDebug  = 0;  
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "e.shopshop36@gmail.com";
    $mail->Password   = "E-shop36";

    $mail->IsHTML(true);
    $mail->AddAddress("e.shopshop36@gmail.com", "e shop");
    $mail->setFrom($email, $nom);
    $mail->Subject = $sujet . " (" . $email . ")";
    $content = $message . '<br>' . $phone;

    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
        
    $mail->MsgHTML($content); 
        if(!$mail->Send()) {
        echo "Error while sending Email.";
        var_dump($mail);
    } else {
        header("loation: contact.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="public/images/logo.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/contact.css">
    <title>E-SHOP</title>
</head>

<body>
    <header>
        <h1>Nous contacter</h1>
        <p>Une question ou une remarque? Écrivez-nous simplement un message!</p>
    </header>

    <main class="container">
        <div class="left">
            <h3>Contact information</h3>
            <p>Remplissez le formulaire et notre équipe vous répondra<br> dans les 24 heures.</p>
            <p class="information"><img src="public/images/call.svg" alt=""> +212 666-666666</p>
            <p class="information"><img src="public/images/message.svg" alt=""> e.shopshop36@gmail.com</p>
            <p class="information"><img src="public/images/location.svg" alt=""> Casablanca</p>
            <div class="social-links">
                <p class="social-link"><img src="public/images/facebook.svg" alt=""></p>
                <p class="social-link"><img src="public/images/instagram.svg" alt=""></p>
                <p class="social-link"><img src="public/images/twitter.svg" alt=""></p>
                <p class="social-link"><img src="public/images/linkedin.svg" alt=""></p>

            </div>
            <div class="big-circle">
                <div class="small-circle"></div>
            </div>

        </div>
        <form class="right" method="POST" action="">
            <div class="flex">
                <div><label for="firstname">First Name</label><input type="text" id="firstname" name="firstname"
                        required></div>
                <div><label for="lastname">Last Name</label><input type="text" id="lastname" name="lastname" required>
                </div>
            </div>
            <div class="flex">
                <div><label for="mail">Mail</label><input type="email" id="mail" name="email" required></div>
                <div><label for="phone">Phone</label><input type="number" id="phone" name="phone" required> </div>
            </div>
            <div>
                <label for="message" style="margin-bottom: 5px;">Message</label>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Write your message.."
                    required></textarea>
            </div>

            <button name="submit" type="submit">Send Message</button>
        </form>
    </main>
</body>

</html>