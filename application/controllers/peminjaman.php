<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('peminjaman_model');
        $this->load->model('buku_model');
        $this->load->model('anggota_model');
    }

    public function index()
    {
        $data['peminjaman'] = $this->peminjaman_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');   
        $this->load->view('peminjaman/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function tambah()
    {
        $data['buku'] = $this->buku_model->get_all();
        $data['anggota'] = $this->anggota_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');   
        $this->load->view('peminjaman/tambah', $data);
        $this->load->view('templates/footer');
    }
    
    public function simpan()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_buku', 'Buku', 'required');
        $this->form_validation->set_rules('nomor_anggota', 'Anggota', 'required');
        $this->form_validation->set_rules('tanggal_pinjam', 'Tanggal Pinjam', 'required');
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'required');

        if($this->form_validation->run() == FALSE){
            $this->tambah();
        } else {
            $data = [
                'id_buku' => $this->input->post('id_buku'),
                'nomor_anggota' => $this->input->post('nomor_anggota'),
                'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
                'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                'status' => 'Dipinjam'
            ];
            $this->peminjaman_model->insert($data);
            
            // Kurangi stok buku
            $buku = $this->buku_model->get_by_id($this->input->post('id_buku'));
            $stok_baru = $buku->stok - 1;
            $this->buku_model->update($this->input->post('id_buku'), ['stok' => $stok_baru]);
            
            $this->session->set_flashdata('success', 'Data peminjaman berhasil disimpan');
            redirect('peminjaman');
        }
    }
    
    public function hapus($id_peminjaman)
    {
        // Ambil data peminjaman sebelum dihapus
        $peminjaman = $this->peminjaman_model->get_by_id($id_peminjaman);
        
        // Kembalikan stok buku
        $buku = $this->buku_model->get_by_id($peminjaman->id_buku);
        $stok_baru = $buku->stok + 1;
        $this->buku_model->update($peminjaman->id_buku, ['stok' => $stok_baru]);
        
        $this->peminjaman_model->delete($id_peminjaman);
        $this->session->set_flashdata('success', "Data peminjaman berhasil dihapus");
        redirect('peminjaman');
    }
    
    public function edit($id_peminjaman)
    {
        $data['peminjaman'] = $this->peminjaman_model->get_by_id($id_peminjaman);
        $data['buku'] = $this->buku_model->get_all();
        $data['anggota'] = $this->anggota_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');   
        $this->load->view('peminjaman/edit', $data);
        $this->load->view('templates/footer');
    }
    
    public function update($id_peminjaman)
    {
        $data = [
            'status' => $this->input->post('status')
        ];
        
        // Jika status dikembalikan, tambah stok buku
        if($this->input->post('status') == 'Kembali'){
            $peminjaman = $this->peminjaman_model->get_by_id($id_peminjaman);
            $buku = $this->buku_model->get_by_id($peminjaman->id_buku);
            $stok_baru = $buku->stok + 1;
            $this->buku_model->update($peminjaman->id_buku, ['stok' => $stok_baru]);
        }
        
        $this->peminjaman_model->update($id_peminjaman, $data);
        $this->session->set_flashdata('success', 'Data peminjaman berhasil diupdate');
        redirect('peminjaman');
    }
    
    public function kembalikan($id_peminjaman)
    {
        $data = [
            'status' => 'Kembali'
        ];
        
        // Kembalikan stok buku
        $peminjaman = $this->peminjaman_model->get_by_id($id_peminjaman);
        $buku = $this->buku_model->get_by_id($peminjaman->id_buku);
        $stok_baru = $buku->stok + 1;
        $this->buku_model->update($peminjaman->id_buku, ['stok' => $stok_baru]);
        
        $this->peminjaman_model->update($id_peminjaman, $data);
        $this->session->set_flashdata('success', 'Buku berhasil dikembalikan');
        redirect('peminjaman');
    }
}
?>