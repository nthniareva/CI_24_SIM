<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class anggota_model extends CI_Model {

    private $table = 'anggota';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($nomor_anggota)
    {
        $this->db->where('nomor_anggota', $nomor_anggota);
        return $this->db->get($this->table)->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function delete($nomor_anggota)
    {
        return $this->db->delete($this->table, array('nomor_anggota' => $nomor_anggota));
    }

    public function update($nomor_anggota, $data)
    {
        $this->db->where('nomor_anggota', $nomor_anggota);
        return $this->db->update($this->table, $data);
    }
}