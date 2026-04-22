<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all()
    {
        $this->db->select('peminjaman.*, buku.judul_buku, anggota.nama');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.id_buku = peminjaman.id_buku');
        $this->db->join('anggota', 'anggota.nomor_anggota = peminjaman.nomor_anggota');
        $this->db->order_by('id_peminjaman', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_id($id_peminjaman)
    {
        $this->db->select('peminjaman.*, buku.judul_buku, anggota.nama');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.id_buku = peminjaman.id_buku');
        $this->db->join('anggota', 'anggota.nomor_anggota = peminjaman.nomor_anggota');
        $this->db->where('id_peminjaman', $id_peminjaman);
        return $this->db->get()->row();
    }

    public function insert($data)
    {
        return $this->db->insert('peminjaman', $data);
    }

    public function update($id_peminjaman, $data)
    {
        $this->db->where('id_peminjaman', $id_peminjaman);
        return $this->db->update('peminjaman', $data);
    }

    public function delete($id_peminjaman)
    {
        $this->db->where('id_peminjaman', $id_peminjaman);
        return $this->db->delete('peminjaman');
    }
}
?>