<?php
class Peminjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('PinjamModel');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // Tampilkan form edit
        $data['tglpinjam'] = date('Y-m-d');
        $data['tglkembali'] = date('Y-m-d', strtotime('+7 day', strtotime($data['tglpinjam'])));
        $data['autonumber'] = $this->PinjamModel->AutoNumbering();
        $data['yobuku'] = $this->PinjamModel->judul()->result();
        $data['bik'] = $this->db->get_where('buku', ['Foto' => $this->session->userdata('Foto')])->row_array();
        // $data['buku'] = $this->PinjamModel->buku()->result();
        $this->load->view('user/pinjamBuku', $data);
    }


    public function dataPeminjam()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['peminjam'] = $this->PinjamModel->getAllPeminjam();

        $this->load->view('admin/dataPeminjam', $data);
    }
    public function cari_buku()
    {
        $judul = $this->input->post('bukuID');
        $cari = $this->PinjamModel->cekBuku($judul);
        //jika ada data anggota
        if ($cari->num_rows() > 0) {
            $buku = $cari->row_array();

            // Kirim data sebagai JSON
            echo json_encode($buku);
        }
    }
    public function cari_byjudul()
    {
        $judul = $this->input->post('Judul');
        $cari = $this->PinjamModel->cekBukuByJudul($judul);

        // Jika ada data buku
        if ($cari->num_rows() > 0) {
            $buku = $cari->row_array();

            // Kirim data sebagai JSON
            echo json_encode($buku);
        }
    }

    public function simpan()
    {


        // $config['upload_path'] = './sampulBuku/peminjaman/';
        // $config['allowed_types'] = 'gif|jpg|jpeg|png|webp|pdf';
        // $config['max_size'] = 5000; // max ukuran file fotonya

        // $this->load->library('upload', $config);

        // Check if the file upload was successful
        // if ($this->upload->do_upload('foto')) {
        //     $upload_data = $this->upload->data();
        $data = array(
            'no_transaksi' => $this->input->post('transaksi'),
            'nama' => $this->input->post('nama'),
            'bukuID' => $this->input->post('bukuID'),
            'TanggalPeminjaman' => $this->input->post('pinjam'),
            'TanggalPengembalian' => $this->input->post('balikin')
        );

        $this->PinjamModel->tambah($data);
        redirect('peminjaman?save_success=true');
        // } else {
        //     // File upload failed, handle the error
        //     echo "ukuran file terlalu besar";

    }
}
