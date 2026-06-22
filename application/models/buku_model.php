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
        // PERBAIKAN: JOIN dengan tabel kategori
        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id = buku.id_kategori', 'left');
        return $this->db->get()->result();
    }

    public function get_by_id($id_buku)
    {
        // PERBAIKAN: JOIN dengan tabel kategori
        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id = buku.id_kategori', 'left');
        $this->db->where('buku.id_buku', $id_buku);
        return $this->db->get()->row();
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