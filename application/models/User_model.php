<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        return $this->db->get("user")->result();

    }
    function get_id_user($id)
    {
        $this->db->get_where('id', $id);
        return $this->db->get('user')->row();

    }
    public function getUserByID($userID)
    {

        $query = $this->db->get_where('user', array('id' => $userID));
        return $query->row_array();
    }

    public function tambah($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id(); // Mengembalikan ID dari data yang baru disimpan
    }
    
    public function update($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);

    }


}