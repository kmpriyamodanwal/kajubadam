<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPPATH.'libraries/phpmailer/Exception.php';
require APPPATH.'libraries/phpmailer/PHPMailer.php';
require APPPATH.'libraries/phpmailer/SMTP.php';

class Hostinger extends CI_Model
{

  public function sendmail($body,$email)
  {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
     // $mail->Host = 'mail.asrbikemechanicathome.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'noreplymailconfig@gmail.com'; // Your gmail
    $mail->Password = 'mnfkxrtwltxukxyk'; // Your gmail app password
     $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    // $mail->SMTPDebug = 1;
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

    $mail->setFrom('aryasingh90016@gmail.com'); // Your gmail jha se jani he
    // $mail->setFrom('azmal.codediffusion@gmail.com'); // Your gmail jha se jani he
    // $mail->addBcc("sendmail@galaxy23.in");
    $mail->addBcc("info@galaxy23.in");

    $mail->addAddress($email); // jha jani he

    $mail->isHTML(true);

    $mail->Subject = "Order Confirmation";
    $mail->Body = $body;

    $mail->send();


    if($mail->send()) 
    {
      echo  "<script>
      alert('Sent Successfully');
      document.location.href = 'thankyou.php';
      </script>
      ";
    } 
    else 
    {
        $errors = $mail->print_debugger();
        print_r($errors);
    }

    // echo
    // "
    // <script>
    // alert('Sent Successfully');
    // document.location.href = 'thankyou';
    // </script>
    // ";
  }


}

