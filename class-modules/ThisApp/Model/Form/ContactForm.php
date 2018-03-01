<?php


namespace Module\ThisApp\Model\Form;


use Bat\ValidationTool;
use Kamille\Services\XConfig;
use Kamille\Services\XLog;

class ContactForm
{


    public static function getModel()
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


                // sending email to admin
                $adminMail = XConfig::get("ThisApp.contact_email");
                XLog::log("Envoi d'un mail à $adminMail");


            }



        }


        return $ret;
    }
}