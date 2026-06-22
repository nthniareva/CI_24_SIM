<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('anggota_model');
        if (!$this->session->userdata('login')){
            redirect('login');
        }
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
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if($this->form_validation->run() == FALSE){
            $this->tambah();
        } else {
            $data = [
                'nomor_anggota' => $this->input->post('nomor_anggota'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status'),
                'tanggal_daftar' => date('Y-m-d')
            ];
            $this->anggota_model->insert($data);
            $this->session->set_flashdata('success', 'Data anggota berhasil disimpan');
            redirect('anggota');
        }
    }
    
    public function hapus($id)
    {
        $this->anggota_model->delete($id);
        $this->session->set_flashdata('success', "Data anggota berhasil dihapus");
        redirect('anggota');
    }
    
    public function edit($id)
    {
        $data['anggota'] = $this->anggota_model->get_by_id($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');   
        $this->load->view('anggota/edit', $data);
        $this->load->view('templates/footer');
    }
    
    public function update($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nomor_anggota', 'Nomor Anggota', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        
        if($this->form_validation->run() == FALSE){
            $this->edit($id);
        } else {
            $data = [
                'nomor_anggota' => $this->input->post('nomor_anggota'),  // <-- INI YANG DITAMBAHKAN
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status')
            ];
            $this->anggota_model->update($id, $data);
            $this->session->set_flashdata('success', 'Data anggota berhasil diupdate');
            redirect('anggota');
        }
    }
}
?>