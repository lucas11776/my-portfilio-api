<?php
/***
 * My Portfilio Mail Template
 * 
 * Developer : Themba Lucas Ngubeni
 * 
*/

class Mail{

    /**
     * Sender Email Address
     * 
     * @var string
    */
    private $sender_email = "thembangubeni04@gmail.com";

    /**
     * Mail Header
     * 
     * @var string
    */
    public $header;

    /**
     * Email to send mail
     * 
     * @var string
    */
    public $mail;

    /**
     * Subject of email
     * 
     * @var string
    */
    public $subject;

    /**
     * Mail Message
     * 
     * @var string
    */
    public $message;

    /**
     * Set header and include mail function
    */
    public function __construct($email, $subject, $message)
    {
        // include mail Template
        require_once "template.php";

        // assign
        $this->email   = $email;
        $this->subject = $subject;
        $this->message = $message; 

        // Set Content Header
        $this->headers = "MIME-Version: 1.0"."\r\n";
        $this->headers .= "Content-type: text/html; charset=iso-8859-1"."\r\n";
        $this->headers .= "To:<".$email.">" . "\r\n";
        $this->headers .= "From:<".$this->sender_email.">"."\r\n";
    }

    /**
     * Send mail to email address
    */
    public function send()
    {
        $html = template($this->subject, $this->message);
        $sent = mail($this->email, $this->subject, $html, $this->headers);

        return $sent;
    }

}