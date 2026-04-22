<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all()
    {
        return $this->db->get('kategori')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('kategori', array('id_kategori' => $id))->row();
    }

    public function insert($data)
    {
        return $this->db->insert('kategori', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->update('kategori', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->delete('kategori');
    }
}
?>