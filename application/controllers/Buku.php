<?php
class Buku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("Buku_model");
        if (!$this->session->userdata("email")) {
            redirect("/");
        }

        $role_id = $this->session->userdata("role_id");

        // Tambahkan kondisi untuk role_id 2
        if ($role_id == 2) {
            redirect("user"); // atau halaman lain sesuai kebijakan Anda
        }
    }

    public function index()
    {
        $data["buku"] = $this->Buku_model->get_all();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("admin/tablebuku", $data);

    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("admin/tambah", $data);
    }

    public function simpan()
    {


        $config['upload_path'] = './foto/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp|pdf';
        $config['max_size'] = 5000; // max ukuran file fotonya

        $this->load->library('upload', $config);

        // Check if the file upload was successful
        if ($this->upload->do_upload('sampul')) {
            $upload_data = $this->upload->data();
            $data = array(
                'Judul' => $this->input->post('Judul'),
                'Kategori' => $this->input->post('Kategori'),
                // 'Rak' => $this->input->post('Rak'),
                'JumlahBuku' => $this->input->post('JumlahBuku'),
                'Foto' => $upload_data['file_name'], // 
                'Penulis' => $this->input->post('Penulis'),
                'Penerbit' => $this->input->post('Penerbit'),
                'TahunTerbit' => $this->input->post('TahunTerbit'),
                'JumlahHalaman' => $this->input->post('JumlahHalaman'),
                'Bahasa' => $this->input->post('Bahasa'),

            );

            $this->Buku_model->tambah($data);
            redirect('buku?save_success=true');
        } else {
            // File upload failed, handle the error
            $this->load->view('admin/tidakdiDukung');

        }
    }


    public function edit($bukuID)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // Validasi form atau proses lain yang diperlukan

        // Mendapatkan data buku berdasarkan ID
        $data['buku'] = $this->Buku_model->getBukuByID($bukuID);

        // Tampilkan form edit
        $this->load->view('admin/update', $data);
    }


    function update()
    {
        $id = $this->input->post('bukuID');
        $judul = $this->input->post('Judul');
        $kategori = $this->input->post('Kategori');
        // $rak = $this->input->post('Rak');
        $jumlahbuku = $this->input->post('JumlahBuku');
        $penulis = $this->input->post('Penulis');
        $penerbit = $this->input->post('Penerbit');
        $tahunterbit = $this->input->post('TahunTerbit');
        $jumlahhalaman = $this->input->post('JumlahHalaman');
        $bahasa = $this->input->post('Bahasa');


        $data = array(
            'Judul' => $judul,
            'Kategori' => $kategori,
            // 'Rak' => $rak,
            'JumlahBuku' => $jumlahbuku,
            'Penulis' => $penulis,
            'Penerbit' => $penerbit,
            'TahunTerbit' => $tahunterbit,
            'JumlahHalaman' => $jumlahhalaman,
            'Bahasa' => $bahasa,

        );

        $this->db->where('bukuID', $id);
        $this->db->update('buku', $data);

        redirect('buku?edit_success=true');
    }

    // Your controller method for deleting a book






    function hapus($id)
    {

        $this->load->model('Buku_model');

        $this->Buku_model->raono($id);
        redirect('buku?delete_success=true');
    }

    // Pada kontroler Buku
    public function detail($bukuID)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // Logika untuk mendapatkan data buku berdasarkan bukuID
        $data['buku'] = $this->Buku_model->getBukuById($bukuID); // Gantilah dengan logika sesuai dengan model dan database Anda

        // Load view atau tampilkan konten halaman
        $this->load->view('admin/detail', $data);
    }







}
?>