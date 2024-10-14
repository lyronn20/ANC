<?php



// Vérifier si les champs du formulaire existent
    $nom = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $message = "Nom : " . $nom . "\n" . "Email : " . $email . "\n" . "Message : " . $message;

    // Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'votre-email@gmail.com';                // SMTP username
        $mail->Password   = 'votre-mot-de-passe';                   // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
        $mail->Port       = 465;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom('votre-email@gmail.com', 'ANC Conciergerie');
        $mail->addAddress('lyronn.langlois@supinfo.com');           // Add a recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = nl2br($message);                           // Convert newlines to <br> tags for HTML
        $mail->AltBody = $message;                                  // Plain text version for non-HTML mail clients

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
