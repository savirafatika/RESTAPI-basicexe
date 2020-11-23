<?php

class Mahasiswa extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Mahasiswa_model');
   }

   public function index()
   {
      $data['judul'] = 'Daftar Mahasiswa';
      $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
      if ($this->input->post('keyword')) {
         $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
      }
      $this->load->view('templates/header', $data);
      $this->load->view('mahasiswa/index', $data);
      $this->load->view('templates/footer');
   }

   public function tambah()
   {
      $data['judul'] = 'Form Tambah Data Mahasiswa';
      $data['jurusan'] = [
         'Informatika',
         'Sistem Informasi',
         'Manajemen Informatika',
         'Ilmu Komunikasi',
         'Arsitektur',
         'Teknik Informatika'
      ];

      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('nim', 'NIM', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

      if ($this->form_validation->run() == FALSE) {
         $this->load->view('templates/header', $data);
         $this->load->view('mahasiswa/tambah', $data);
         $this->load->view('templates/footer');
      } else {
         $this->session->set_flashdata('message', 'ditambahkan!');
         redirect('mahasiswa');
      }
   }

   public function hapus($id)
   {
      $this->Mahasiswa_model->hapusDataMahasiswa($id);
      $this->session->set_flashdata('message', 'dihapus!');
      redirect('mahasiswa');
   }

   public function detail($id)
   {
      $data['judul'] = 'Detail Data Mahasiswa';
      $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
      $this->load->view('templates/header', $data);
      $this->load->view('mahasiswa/detail', $data);
      $this->load->view('templates/footer');
   }

   public function ubah($id)
   {
      $data['judul'] = 'Form Ubah Data Mahasiswa';
      $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
      $data['jurusan'] = [
         'Informatika',
         'Sistem Informasi',
         'Manajemen Informatika',
         'Ilmu Komunikasi',
         'Arsitektur',
         'Teknik Informatika'
      ];

      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('nim', 'NIM', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

      if ($this->form_validation->run() == FALSE) {
         $this->load->view('templates/header', $data);
         $this->load->view('mahasiswa/ubah', $data);
         $this->load->view('templates/footer');
      } else {
         $this->Mahasiswa_model->ubahDataMahasiswa();
         $this->session->set_flashdata('message', 'diubah!');
         redirect('mahasiswa');
      }
   }
}
