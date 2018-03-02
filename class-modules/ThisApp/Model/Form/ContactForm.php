<?php


namespace Module\ThisApp\Model\Form;


use Bat\ValidationTool;
use Kamille\Services\XConfig;

class ContactForm
{


    public static function getModel(callable $onSuccess = null)
    {
        $ret = [
            'successMessage' => "",
            // controls
            'first_name' => [
                'error' => '',
                'value' => '',
            ],
            'last_name' => [
                'error' => '',
                'value' => '',
            ],
            'email' => [
                'error' => '',
                'value' => '',
            ],
            'message' => [
                'error' => '',
                'value' => '',
            ],
        ];


        if (array_key_exists("first_name", $_POST)) {


            // basic data persistency
            $ret["first_name"]['value'] = $_POST['first_name'];
            $ret["last_name"]['value'] = $_POST['last_name'];
            $ret["email"]['value'] = $_POST['email'];
            $ret["message"]['value'] = $_POST['message'];


            // quick validation
            $email = $_POST['email'];
            $message = $_POST['message'];
            $hasError = false;

            if (false === ValidationTool::isEmail($email)) {
                $ret["email"]['error'] = "Le format de l'adresse mail est incorrect";
                $hasError = true;
            }

            $nbMin = 5;
            if (strlen($message) < $nbMin) {
                $ret["message"]['error'] = "Votre message doit contenir au minimum $nbMin caractères";
                $hasError = true;
            }

            if (false === $hasError) {
                $ret['successMessage'] = "Merci! Notre équipe reviendra bientôt vers vous.";

                // reinitialize values
                $ret["first_name"]['value'] = "";
                $ret["last_name"]['value'] = "";
                $ret["email"]['value'] = "";
                $ret["message"]['value'] = "";

                if (null !== $onSuccess) {
                    $onSuccess($_POST);
                }
            }
        }


        return $ret;
    }


    public static function onFormSuccess()
    {
        return function (array $postedData) {


            // sending email to admin
            $adminMail = XConfig::get("ThisApp.contact_email");
            $from = XConfig::get("ThisApp.email_from");


            $to = $adminMail;
            $subject = "Nouveau message du site kamille-app-bootstrap";
            $message = 'Ce message a été envoyé à ' . date("Y-m-d H:i:s") . PHP_EOL;
            $message .= "Prénom: " . $postedData['first_name'] . PHP_EOL;
            $message .= "Nom: " . $postedData['last_name'] . PHP_EOL;
            $message .= "email: " . $postedData['email'] . PHP_EOL;
            $message .= "Message: " . $postedData['message'] . PHP_EOL;
            $message .= str_repeat(PHP_EOL, 5);
            $message .= "Cordialement, votre robot du site kamille-app-bootstrap";


            $headers = 'From: ' . $from . "\r\n" .
                'Reply-To: ' . $from . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);
        };
    }
}