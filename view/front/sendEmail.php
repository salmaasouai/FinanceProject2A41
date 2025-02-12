<?php
// send_email.php

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
require '../../controller/eventC.php';

// Vérifiez si les données POST nécessaires sont présentes
if(isset($_POST['userEmail']) && isset($_POST['eventName']) && isset($_POST['Date']) &&  isset($_POST['Idevent'])) {
    $to = $_POST['userEmail'];
    $eventName = $_POST['eventName'];
    $eventDate = $_POST['Date']; // Date de l'événement au format YYYY-MM-DD
    $Idevent= $_POST['Idevent']; 

    // Créez une instance de la classe alertC
    $alert = new alertC();

    // Vérifiez si l'email et l'événement existent déjà dans la base de données
    $existingAlert = $alert->getAlertByUserAndEvent($to, $Idevent);

    // Si une alerte avec le même email et le même événement existe déjà
    if($existingAlert) 
    {
        // Affichez un message d'erreur
        echo "Un code est déjà enovyé à cette adresse mail pour pouvoir accéder à cet evenement.";
        echo json_encode(array("status" => "error", "message" => "Une demande avec le même email et le même événement est déjà en cours."));

        
    } else 
    {
        // Ajouter la nouvelle alerte seulement si elle n'existe pas déjà
        $alert->addalerte($to, $eventDate, $eventName, $Idevent);
        echo "Votre demande a ete ajoutee avec succes.";
    // Générer un code aléatoire de 6 caractères
$code = '';
for ($i = 0; $i < 6; $i++) 
{
    $code .= rand(0, 9); // Concaténer un chiffre aléatoire au code
}

        // Construire le sujet de l'e-mail
        $subject = 'Code genere pour l\'acces a l\'evenement ' . $eventName;

        // Construire le message d'e-mail
        $message = "Cher(e) $to, voici votre code pour acceder a l\'evenement $eventName: $code.<br><br>";
        $message .= "Date de l\'evenement : $eventDate<br>";

        $message .= "<br>";
        $message .= 'Merci pour votre interet pour notre site. N\'hesitez pas a nous contacter à Taktik@gmail.com si vous avez des preoccupations.<br>';
        $message .= 'Cordialement,<br>';
        $message .= 'Taktik.tn';

        // Envoi de l'e-mail
        $emailSent = sendEmailNotification($to, $subject, $message);

        if ($emailSent) {
            echo 'Email sent successfully';
            echo json_encode(array("status" => "success", "message" => "Votre demande a été enregistrée avec succès."));

        } else {
            echo 'Failed to send email. Please check your email configuration.';
            echo json_encode(array("status" => "email_error", "message" => "Erreur lors de l'envoi de l'e-mail. Veuillez vérifier votre configuration e-mail."));

        }
    }
}

else 
{
    echo 'Email address, event name, or event date not provided';
}

// envoyer un mail automatiquement lorsque l'event est demain sans intervention manuelle 
/*$ec = new EventC();
$tab = $ec->afficher();

foreach ($tab as $alert) {
    $to = $alert['userEmail'];
    $eventName = $alert['eventName'];
    $eventDate = new DateTime($alert['eventDate']);

    $eventDateTime = new DateTime($eventDate);
    $reminderDate = clone $eventDateTime;
    $reminderDate->modify('-3 days');

    // Calculer la différence entre la date actuelle et la date limite pour l'envoi de l'e-mail
    $currentDate = new DateTime();
    $difference = $currentDate->diff($reminderDate);

    // Vérifier si la différence est de 2 jours
    if ($difference->days === 2) {
        // Construire le sujet de l'e-mail
        $subject = 'Alerte pour l\'événement ' . $eventName;

        // Construire le message d'e-mail
        $message = "Cher(e) $to, vous avez demandé à être alerté pour l'événement $eventName qui se déroulera dans deux jours.\n\n";
        $message .= "Date de l'événement : " . $eventDate->format('Y-m-d') . "\n";

        // Envoyer l'e-mail de rappel
        $emailSent = sendEmailNotification($to, $subject, $message);

        if ($emailSent) {
            // Ajouter un message de succès au tableau de débogage
            $debugMessages[] = "Email sent successfully to $to for event $eventName";
        } else {
            // Ajouter un message d'erreur au tableau de débogage
            $debugMessages[] = "Failed to send email to $to for event $eventName. Please check your email configuration.";
        }
    }
}*/



// Faites une requête AJAX pour récupérer les messages de débogage depuis le script PHP

   


    



/*if(isset($_POST['userEmail']) && isset($_POST['eventName']) && isset($_POST['Date'])) {
    $to = $_POST['userEmail'];
    $eventName = $_POST['eventName'];
    $eventDate = $_POST['Date']; // Date de l'événement au format YYYY-MM-DD

    // Convertir la date de l'événement en objet DateTime
    $eventDateTime = new DateTime($eventDate);

    // Calculer la date limite pour l'envoi de l'e-mail (2 jours avant la date de l'événement)
    $reminderDate = clone $eventDateTime;
    $reminderDate->modify('-3 days');

    // Calculer la différence entre la date actuelle et la date limite pour l'envoi de l'e-mail
    $currentDate = new DateTime();
    $difference = $currentDate->diff($reminderDate);

    // Vérifier si la différence est exactement deux jours
    if ($difference->days === 2) 
    {
        // Construire le sujet de l'e-mail
        $subject = 'Alerte pour l\'événement ' . $eventName;

        // Construire le message d'e-mail
        $message = "Cher(e) $to, vous avez demandé à être alerté pour l'événement $eventName.<br><br>";
        $message .= "Date de l'événement : $eventDate<br>";

        $message .= "<br>";
        $message .= 'Merci pour votre intérêt pour notre site. N\'hésitez pas à nous contacter à Taktik@gmail.com si vous avez des préoccupations.<br>';
        $message .= 'Cordialement,<br>';
        $message .= 'Taktik.tn';

        // Envoi de l'e-mail
        $emailSent = sendEmailNotification($to, $subject, $message);

        if ($emailSent) {
            echo 'Email sent successfully';
        } else {
            echo 'Failed to send email. Please check your email configuration.';
        }
    } 
    else 
    {
        echo 'Reminder email not sent. It is not yet time to send the reminder.';
    }
} 
else 
{
    echo 'Email address, event name, or event date not provided';
}
*/

// Function to send email notification
function sendEmailNotification($to, $subject, $message) 
{
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;          // Enable verbose debug output
        $mail->isSMTP();                                // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';           // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                       // Enable SMTP authentication
        $mail->Username   = 'salma.souai@esprit.tn';    // SMTP username
        $mail->Password   = 'qusd tolm pzba hnyc';      // SMTP password
        $mail->SMTPSecure = 'ssl';                      // Enable SSL encryption
        $mail->Port       = 465;                        // TCP port to connect to

        // Recipients
        $mail->setFrom('TAKTIK.Tn@gmail.tn', 'Taktik.tn');
        $mail->addAddress($to);                         // Add a recipient
        $mail->isHTML(true);                            // Set email format to HTML

        // Content
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Send the email
        $mail->send();

        // Message de débogage pour vérifier si l'e-mail est envoyé
        error_log('Email sent successfully');

        return true; // Email sent successfully
    } catch (Exception $e) {
        error_log('Error sending email: ' . $mail->ErrorInfo);
        return false; // Email could not be sent
    }
}
?>


