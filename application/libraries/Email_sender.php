<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_sender {

    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('email');
    }

    public function send($to_email, $subject, $message, $file_path = '')
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.bagiyodensoacmobil.com',
            'smtp_port' => 465,
            'smtp_user' => 'official@bagiyodensoacmobil.com',
            'smtp_pass' => 'OfficialBagiyo#2023',
            'smtp_crypto' => 'ssl',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->CI->email->initialize($config);
        $this->CI->email->from('official@bagiyodensoacmobil.com', 'Official Bagiyo Denso');
        $this->CI->email->to($to_email);
        $this->CI->email->subject($subject);
        $this->CI->email->message($message);

        if (!empty($file_path)) {
            $this->CI->email->attach($file_path);
        }

        if ($this->CI->email->send()) {
            return true;
        } else {
            log_message('error', $this->CI->email->print_debugger());
            return false;
        }
    }
}
