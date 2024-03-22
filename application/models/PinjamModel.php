<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PinjamModel extends CI_Model
{
    private $table = "peminjaman";
    private $tmp = "tmp";
    public function getAllBuku()
    {
        $query = $this->db->get('buku');
        return $query->result();
    }
    public function getAllPeminjam()
    {
        $query = $this->db->get('peminjaman');
        return $query->result();
    }
    function AutoNumbering()
    {
        $today = date('Ymd');

        $data = $this->db->query("SELECT MAX(no_transaksi) AS last FROM $this->table")->row_array();

        $lastNoFaktur = $data['last'];

        // Pastikan $lastNoFaktur bukan null sebelum menggunakan substr
        if ($lastNoFaktur !== null) {
            $lastNoUrut = substr($lastNoFaktur, 8, 3);
            $nextNoUrut = $lastNoUrut + 1;
        } else {
            // Jika $lastNoFaktur null, atur nomor urut menjadi 1
            $nextNoUrut = 1;
        }

        $nextNoTransaksi = $today . sprintf('%03s', $nextNoUrut);

        return $nextNoTransaksi;
    }



    function judul()
    {
        return $this->db->get('buku');
    }
    // function bukuID()
    // {
    //     $this->db->order_by('buku.bukuID desc');
    //     return $this->db->get('buku');
    // }

    // function buku()
    // {
    //     $this->db->order_by('buku.judul ASC');
    //     return $this->db->get('buku');
    // }
    function cekBuku($kode)
    {
        $this->db->select('bukuID, Judul, Penulis, Kategori,Penerbit, Foto'); // Pilih kolom yang diinginkan
        $this->db->where("bukuID", $kode);
        return $this->db->get("buku");
    }
    public function cekBukuByJudul($judul)
    {
        $this->db->select('bukuID, Judul, Penulis, Kategori, Penerbit, Foto');
        $this->db->where('Judul', $judul);
        return $this->db->get('buku');
    }
    public function tambah($data)
    {
        $this->db->insert('peminjaman', $data);
        return $this->db->insert_id(); // Mengembalikan ID dari data yang baru disimpan
    }



}
