<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('anggota_model');
    }

    public function index()
    {
        $data['anggota'] = $this->anggota_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');   
        $this->load->view('anggota/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');   
        $this->load->view('anggota/tambah');
        $this->load->view('templates/footer');
    }
    
    public function simpan()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nomor_anggota', 'Nomor Anggota', 'required|is_unique[anggota.nomor_anggota]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('tgl_daftar', 'Tanggal Daftar', 'required');

        if($this->form_validation->run() == FALSE){
            $this->tambah();
        } else {
            $data = [
                'nomor_anggota' => $this->input->post('nomor_anggota'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon'),
                'email' => $this->input->post('email'),
                'tgl_daftar' => $this->input->post('tgl_daftar'),
                'status' => 'Aktif'
            ];
            $this->anggota_model->insert($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('anggota');
        }
    }
    
    public function hapus($nomor_anggota)
    {
        $this->anggota_model->delete($nomor_anggota);
        $this->session->set_flashdata('success', "Data Berhasil Dihapus");
        redirect('anggota');
    }
    
    public function edit($nomor_anggota)
    {
        $data['anggota'] = $this->anggota_model->get_by_id($nomor_anggota);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');   
        $this->load->view('anggota/edit', $data);
        $this->load->view('templates/footer');
    }
    
    public function update($nomor_anggota)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if($this->form_validation->run() == FALSE){
            $this->edit($nomor_anggota);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status')
            ];
            $this->anggota_model->update($nomor_anggota, $data);
            $this->session->set_flashdata('success', 'Data Berhasil di Update');
            redirect('anggota');
        }
    }
}