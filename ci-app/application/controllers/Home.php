<?php

class Home extends CI_Controller
{
   public function index($nama = 'Savira Fatika')
   {
      $data['judul'] = 'Home';
      $data['nama'] = $nama;
      $this->load->view('templates/header', $data);
      $this->load->view('home/index');
      $this->load->view('templates/footer');
   }
   public function about()
   {
      $data['judul'] = 'About';
      $this->load->view('templates/header', $data);
      $this->load->view('home/about');
      $this->load->view('templates/footer');
   }
}
