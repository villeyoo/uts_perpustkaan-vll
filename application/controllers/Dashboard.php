<?php

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'PintarLiterasi'));

        if (!$this->session->userdata("email")) {
            redirect("/");
        }

        $role_id = $this->session->userdata("role_id");

        // Tambahkan kondisi untuk role_id 2
        if ($role_id == 2) {
            redirect("user"); // atau halaman lain sesuai kebijakan Anda
        }
    }

    public function Index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/admin', $data);

    }
    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // Logika untuk mendapatkan data buku berdasarkan bukuID
        $this->load->view('admin/profile', $data);
    }



}
