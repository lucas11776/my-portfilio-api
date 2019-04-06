<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_model extends CI_Model
{

    /**
     * Include Mail Template
     * 
     * @return void
    */
    public function __construct(){
        require_once './mail/mail.php';
    }

    /**
     * Send Mail To User Email Address
     * 
     * @param string mail
     * @param string subject
     * @param string message 
     * @return boolean
    */
    public function send_mail_user($mail, $subject, $message)
    {
        // init mail template
        $mail = new Mail($mail, $subject, $message);
        
        // send mail
        return $mail->send();
    }

}