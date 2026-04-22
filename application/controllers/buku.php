<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('buku_model');
    }

    public function index()
    {
        $data['buku'] = $this->buku_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');   
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');   
        $this->load->view('buku/tambah');
        $this->load->view('templates/footer');
    }
    
    public function simpan()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kode_buku', 'Kode Buku', 'required|is_unique[buku.kode_buku]');
        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');

        if($this->form_validation->run() == FALSE){
            $this->tambah();
        } else {
            $data = [
                'kode_buku' => $this->input->post('kode_buku'),
                'judul_buku' => $this->input->post('judul_buku'),
                'penulis' => $this->input->post('penulis'),
                'penerbit' => $this->input->post('penerbit'),
                'stok' => $this->input->post('stok'),
                'status' => 'Tersedia'
            ];
            $this->buku_model->insert($data);
            $this->session->set_flashdata('success', 'Data buku berhasil disimpan');
            redirect('buku');
        }
    }
    
    public function hapus($id_buku)
    {
        $this->buku_model->delete($id_buku);
        $this->session->set_flashdata('success', "Data buku berhasil dihapus");
        redirect('buku');
    }
    
    public function edit($id_buku)
    {
        $data['buku'] = $this->buku_model->get_by_id($id_buku);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');   
        $this->load->view('buku/edit', $data);
        $this->load->view('templates/footer');
    }
    
    public function update($id_buku)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        
        if($this->form_validation->run() == FALSE){
            $this->edit($id_buku);
        } else {
            $data = [
                'judul_buku' => $this->input->post('judul_buku'),
                'penulis' => $this->input->post('penulis'),
                'penerbit' => $this->input->post('penerbit'),
                'stok' => $this->input->post('stok'),
                'status' => $this->input->post('status')
            ];
            $this->buku_model->update($id_buku, $data);
            $this->session->set_flashdata('success', 'Data buku berhasil diupdate');
            redirect('buku');
        }
    }
}
?>