<?php
  ob_start();
  session_start();

  $fname = $_POST["fname"];
  $lname = $_POST["sname"];
  $name = $fname . " " . $lname;
  $email = $_POST["email"];
  $mes = $_POST["message"];
  $opt = $_POST["option"];

  $to = "kbycres@gmail.com";
  $subject = "Message by: " . $name;

  $message = "
    <!DOCTYPE html>
    <html>
      <head>
        <title>Message by: " . $name ."</title>
      </head>
      <body>
        <table>
          <tr>
            <td>
              Customer name:
            </td>
            <td>
              " . $name . "
            </td>
          </tr>
          <tr>
            <td>
              Email:
            </td>
            <td>
              " . $email . "
            </td>
          </tr>
            <td>
              Message:
            </td>
            <td>
              " . $mes . "
            </td>
          </tr>
        </table>
      </body>
    </html>";

  echo $message;

  require '../phpmailer/PHPMailerAutoload.php';

  $mail = new PHPMailer;

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'kbycres@gmail.com';
  $mail->Password = 'll931217';
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
  $mail->setFrom($email, $name);
  $mail->addAddress('kbycres@gmail.com');
  $mail->WordWrap = 50;
  $mail->isHTML(true);

  $mail->Subject = $subject;
  $mail->Body    = $message;

  if(!$mail->send()) {
     echo 'Message could not be sent.';
     echo 'Mailer Error: ' . $mail->ErrorInfo;
     $_SESSION["status"] = $mail->ErrorInfo;
     header("location: status.php");
     exit;
  }

  echo 'Message has been sent';

  $_SESSION["status"] = $opt;
  header("location: status.php");
?>
