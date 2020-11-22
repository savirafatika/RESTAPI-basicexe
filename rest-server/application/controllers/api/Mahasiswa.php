<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends CI_Controller
{
   use REST_Controller {
      REST_Controller::__construct as private __resTraitConstruct;
   }

   public function __construct()
   {
      parent::__construct();
      $this->__resTraitConstruct();
      $this->load->model('Mahasiswa_model', 'mhs');
   }
   public function index_get()
   {
      $id = $this->get('id');
      if ($id === null) {
         $mhs = $this->mhs->getMhs();
      } else {
         $mhs = $this->mhs->getMhs($id);
      }

      if ($mhs) {
         $this->response([
            'status' => true,
            'data' => $mhs
         ], 200);
      } else {
         $this->response([
            'status' => false,
            'message' => 'id not found'
         ], 404);
      }
   }


   public function index_delete()
   {
      $id = $this->delete('id');

      if ($id === null) {
         $this->response([
            'status' => false,
            'message' => 'provide an id'
         ], 400);
      } else {
         if ($this->mhs->deleteMhs($id)) {
            // ok
            $this->response([
               'status' => true,
               'id' => $id,
               'message' => 'deleted successfully!'
            ], 202);
         } else {
            // id not found
            $this->response([
               'status' => false,
               'message' => 'id not found'
            ], 400);
         }
      }
   }

   public function index_post()
   {
      $data = [
         'nama' => $this->post('nama'),
         'nim' => $this->post('nim'),
         'email' => $this->post('email'),
         'jurusan' => $this->post('jurusan')
      ];

      if ($this->mhs->createMhs($data) > 0) {
         $this->response([
            'status' => true,
            'message' => 'new mahasiswa has been created!'
         ], 201);
      } else {
         $this->response([
            'status' => false,
            'message' => 'failed to create new data!'
         ], 400);
      }
   }

   public function index_put()
   {
      $id = $this->put('id');
      $data = [
         'nama' => $this->put('nama'),
         'nim' => $this->put('nim'),
         'email' => $this->put('email'),
         'jurusan' => $this->put('jurusan')
      ];

      if ($this->mhs->updateMhs($data, $id) > 0) {
         $this->response([
            'status' => true,
            'message' => 'mahasiswa has been updated!'
         ], 200);
      } else {
         $this->response([
            'status' => false,
            'message' => 'failed to update new data!'
         ], 400);
      }
   }

   // close class
}
