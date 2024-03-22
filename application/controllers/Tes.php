<?php

class Tes extends CI_Controller
{
    public function index()
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'pintarliterasii@gmail.com',
            'smtp_pass' => 'pafjvzupvwlhevic',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->email->initialize($config);

        // Desain HTML untuk email
        $email_content = $this->load->view('email/verification', array(
            'verification_link' => 'https://example.com/verify',  // Ganti dengan link yang sesuai
            'verification_limit' => '2024-03-07 12:00:00'  // Ganti dengan batas verifikasi yang sesuai
        ), true);

        $this->email->from('pintarliterasii@gmail.com', 'Pintar Literasi');
        $this->email->to('nabilmaulana1140@gmail.com');
        $this->email->subject('Verifikasi Akun');
        $this->email->message($email_content);

        if ($this->email->send()) {
            echo 'Email terkirim!';
        } else {
            echo $this->email->print_debugger();
            die();
        }
    }



}
