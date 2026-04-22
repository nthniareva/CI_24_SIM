<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all()
    {
        return $this->db->get('buku')->result();
    }

    public function get_by_id($id_buku)
    {
        return $this->db->get_where('buku', array('id_buku' => $id_buku))->row();
    }

    public function insert($data)
    {
        return $this->db->insert('buku', $data);
    }

    public function update($id_buku, $data)
    {
        $this->db->where('id_buku', $id_buku);
        return $this->db->update('buku', $data);
    }

    public function delete($id_buku)
    {
        $this->db->where('id_buku', $id_buku);
        return $this->db->delete('buku');
    }
}
?>