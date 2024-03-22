<?php

class Buku_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        return $this->db->get("buku")->result();

    }
    public function insert_buku($data)
    {
        var_dump($data); // Tampilkan isi $data untuk debugging
        $this->db->insert('buku', $data);
    }

    public function tambah($data)
    {
        $this->db->insert('buku', $data);
        return $this->db->insert_id(); // Mengembalikan ID dari data yang baru disimpan
    }

    public function get_by_id($id)
    {
        return $this->db->get_where("buku", array('bukuID' => $id))->row();

    }


    public function delete($id)
    {
        $this->db->where("bukuId", $id);
        $this->db->delete("buku");
    }

    public function getBukuByID($bukuID)
    {

        $query = $this->db->get_where('buku', array('bukuID' => $bukuID));
        return $query->row_array();
    }
    
    public function getBukuByFotoName($fotoName)
    {
        // Ambil informasi buku berdasarkan nama file foto
        $query = $this->db->get_where('buku', array('Foto' => $fotoName));
        return $query->row();
    }


    public function raono($id)
    {
        //ambil nama file di database sesuai dengan id buku
        $fotoName = $this->getFotoNameById($id);

        // hapus buku di database dadah buku
        $this->db->where('bukuID', $id);
        $this->db->delete('buku');


        if (!empty($fotoName)) {
            $filePath = FCPATH . 'foto/' . $fotoName;


            if (file_exists($filePath)) {
                unlink($filePath); // file di folder lengit
            }
        }
    }

    public function getFotoNameById($id)
    {
        // Ambil nama file foto berdasarkan ID buku
        $query = $this->db->get_where('buku', array('bukuID' => $id));
        $result = $query->row();

        if ($result) {
            return $result->Foto;
        }

        return null;
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->like('Judul', $keyword);
        $this->db->or_like('Kategori', $keyword);

        return $this->db->get()->result();
    }





}
?>