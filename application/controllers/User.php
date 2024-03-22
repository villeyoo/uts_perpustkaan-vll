<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("Buku_model");
        $this->load->model("User_model");
        $this->load->model("PinjamModel");



        is_masuk();
    }



    public function Index()
    {
        $data["buku"] = $this->Buku_model->get_all();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/user', $data);
        // if (!$this->session->userdata("email")) {
        //     redirect("/");
        // }


    }

    public function cari()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $keyword = $this->input->post('keyword');
        $data['buku'] = $this->Buku_model->get_keyword($keyword);
        $this->load->view('user/user', $data);

    }

    public function detail($bukuID)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // // Logika untuk mendapatkan data buku berdasarkan bukuID
        $data['buku'] = $this->Buku_model->getBukuById($bukuID); // Gantilah dengan logika sesuai dengan model dan database Anda

        // Load view atau tampilkan konten halaman
        $this->load->view('user/detailBuku', $data);
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data["pg"] = $this->User_model->get_all();
        $this->load->view('user/profileUser', $data);
    }

    public function edit($userID)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pg'] = $this->User_model->getUserByID($userID);
        // Tampilkan form edit
        $this->load->view('user/editUser', $data);
    }


    function update()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $kelas = $this->input->post('kelas');
        // $rak = $this->input->post('Rak');
        $kota = $this->input->post('kota');
        $jenis = $this->input->post('jeniskelamin');

        $config['upload_path'] = './profile/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('sampul')) {
            $user = $this->db->get_where('user', array('id' => $id))->row();
            if ($user->foto) {
                $previous_photo_path = './profile/' . $user->foto;
                if (file_exists($previous_photo_path)) {
                    unlink($previous_photo_path);
                }
            }

            $upload_data = $this->upload->data();
            $foto = $upload_data['file_name'];
        } else {
            // Jika tidak ada file yang diunggah, gunakan foto lama
            $foto = $this->input->post('foto_lama');
        }

        // Data yang akan diupdate
        $data = array(
            'name' => $name,
            'kelas' => $kelas,
            // 'Rak' => $rak,
            'kota' => $kota,
            'jeniskelamin' => $jenis,
            'foto' => $foto,
        );

        $this->db->where('id', $id);
        $this->db->update('user', $data);

        redirect('user/profile?edit_success=true');
    }

  
    // public function getInfoBuku()
    // {
    //     $judul = $this->input->post('judul');
    //     $cari = $this->PinjamModel->cekBuku()()($judul);
    //     //jika ada data anggota
    //     if ($cari->num_rows() > 0) {
    //         $danggota = $cari->row_array();
    //         echo $danggota['penulis'];
    //     }
    // }






}

//     public function gantiProfile($userID)
//     {
//         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

//         $data['pg'] = $this->User_model->getUserByID($userID);
//         // Tampilkan form edit
//         $this->load->view('user/gantiProfil', $data);
//     }
// }



