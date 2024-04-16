<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\ssml

;
require 'phpmailrs/src/Exception.php';
require 'phpmailrs/src/PHPMailer.php';
require 'phpmailrs/src/Ssl.php';  

session_start();


if(isset($_POST['email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $reset_code = generateResetCode(); 

    sendResetCodeByEmail($email, $reset_code, $smtp_host, $smtp_username, $smtp_password);

    $_SESSION['reset_code'] = $reset_code;

    header("Location: Code_Reset.html");
    exit(); 
} else {
    echo "Email lipsă!";
}

$conn->close();

// Funcție pentru generarea unui cod de resetare
function generateResetCode() {
    return mt_rand(100000, 999999); 
}


function sendResetCodeByEmail($email, $reset_code, $smtp_host, $smtp_username, $smtp_password) {
    $mail = new PHPMailer(true);

    try {
     
        $mail->isSMTP();
        $mail->Host = $smtp_host; 
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_username; 
        $mail->Password = $smtp_password; 
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

    
        $mail->setFrom($smtp_username, 'Admin'); 
        $mail->addAddress($email);

        $mail->Subject = 'Cod de resetare a parolei';
        $mail->Body = 'Codul tău de resetare a parolei este: ' . $reset_code;

        $mail->send();
    } catch (Exception $e) {
        echo "Email-ul nu a putut fi trimis. Eroare: {$mail->ErrorInfo}";
    }
}
?>
