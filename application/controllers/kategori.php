<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
    }

    public function index()
    {
        $data['kategori'] = $this->kategori_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');   
        $this->load->view('kategori/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');   
        $this->load->view('kategori/tambah');
        $this->load->view('templates/footer');
    }
    
    public function simpan()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if($this->form_validation->run() == FALSE){
            $this->tambah();
        } else {
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori')
            ];
            $this->kategori_model->insert($data);

            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('kategori');
        }
    }
    
    public function hapus($id)
    {
        $this->kategori_model->delete($id);
        $this->session->set_flashdata('success', "Data Berhasil Dihapus");
        redirect('kategori');
    }
    
    public function edit($id)
    {
        // PERBAIKAN 1: Gunakan get_by_id, bukan get_all
        $data['kategori'] = $this->kategori_model->get_by_id($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');   
        $this->load->view('kategori/edit', $data);
        $this->load->view('templates/footer');
    }
    
    public function update($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        
        if($this->form_validation->run() == FALSE){
            // PERBAIKAN 2: Hapus kutipan di $id
            $this->edit($id);
        } else {
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori')
            ];
            $this->kategori_model->update($id, $data);
            $this->session->set_flashdata('success', 'Data Berhasil di Update');
            redirect('kategori');
        }
    }
}