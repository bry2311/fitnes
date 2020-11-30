<?php 
include '../koneksi.php';
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$data = mysqli_query($koneksi,"SELECT * FROM tbl_member");
$email = "";
$nama ="";
$tanggalHariIni = date("Y-m-d");
while($d = mysqli_fetch_array($data)){
    $nama = $d['nama_member'];
    $email = $d['email'];
    $berlaku = $d['berlaku_member'];
    $dt = date_create($berlaku);
    $df = date_format($dt,"Y-m-d h:m:s");
    $date_expire = $df;    
    $date = new DateTime($date_expire);
    $now = new DateTime();
    $d = $now->diff($date)->format("%d");
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'fitneslaras42@gmail.com';                     // SMTP username
        $mail->Password   = 'Ukm12345';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('fitneslaras42@gmail.com', 'Mailer');
        $mail->addAddress($email, 'Joe User');     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $_POST['subject'];
        $mail->Body    = $_POST['body'];
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $status = 'Message has been sent';
    } catch (Exception $e) {
        $status = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";    
    }
}

header("location:member_data.php?status=".$status);