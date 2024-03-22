<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');


    }

    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email wajib di isi!',
        ]);



        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password wajib di isi!',
        ]);
        if ($this->form_validation->run() == false) {

            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    //kalo role id nya 1 ke admin role id 2 ke user
                    if ($user['role_id'] == 1) {
                        redirect('dashboard');
                    }
                    redirect('user');
                } else {

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Kata sandi salah 
                       </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Email belum diaktivasi
                   </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email belum diregistrasi
           </div>');
            redirect('auth');
        }
    }


    public function daftar()
    {

        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Nama lengkap wajib di isi!'
        ]);
        $this->form_validation->set_rules('jk', 'Jk', 'required|trim', [
            'required' => 'Jenis kelamin wajib di isi!'
        ]);
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim', [
            'required' => 'Nama Kota wajib di isi!'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|callback_check_email_domain|is_unique[user.email]', [
            'is_unique' => 'alamat email sudah di gunakan'
        ]);

        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
            'required' => 'Kelas wajib di pilih!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Kata sandi tidak sama',
            'min_length' => 'Kata sandi terlalu pendek',
            'required' => 'Password wajib di isi!'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/registration');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'kelas' => htmlspecialchars($this->input->post('kelas', true)),
                'kota' => htmlspecialchars($this->input->post('kota', true)),
                'jeniskelamin' => htmlspecialchars($this->input->post('jk', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'data_created' => time()

            ];


            // token nya

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);




            $this->send_mail($token, 'verify');



            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil membuat akun silahkan cek email untuk aktivasi
        </div>');
            redirect('auth');

        }
    }


    public function send_mail($token, $type)
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


        $this->email->from('pintarliterasii@gmail.com', 'pintar literasi');
        $this->email->to($this->input->post('email'));
        if ($type == 'verify') {
            // Mengambil template email dari file
            $email_template = $this->load->view('email/verification', array(
                'verification_link' => base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token),
                'verification_limit' => date('Y-m-d H:i:s', strtotime('+24 hours'))
            ), true);

            $this->email->subject('Verifikasi Akun');
            $this->email->message($email_template);

            if ($this->email->send()) {
                return true;
            } else {
                echo $this->email->print_debugger();
                die();
            }
        }


    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();


            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' sudah di aktivasi silahkan login</div>');
                    redirect('auth');
                } else {


                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);


                    $this->session->set_flashdata('message', '<div class="alert alert-danger"  role="alert">
            Token kedaluwarsa
            </div>');
                    redirect('auth');
                }

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Akun gagal di aktivasi! token salah
          </div>');
                redirect('auth');
            }

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Akun gagal di aktivasi! email salah
          </div>');
            redirect('auth');
        }
    }




    public function Logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        // Set flashdata untuk notifikasi
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil keluar
    </div>');
        redirect('auth');
    }


    public function check_email_domain($email)
    {
        // cek email kalo ga gmail.com bererti ra iso daftar
        $allowed_domain = 'gmail.com';
        $email_parts = explode('@', $email);

        if (isset($email_parts[1]) && $email_parts[1] !== $allowed_domain) {
            $this->form_validation->set_message('check_email_domain', 'Pastikan alamat email benar ' . $allowed_domain);
            return false;
        }

        return true;
    }

    public function tes()
    {
        $this->load->view('email/verification');
    }


}
