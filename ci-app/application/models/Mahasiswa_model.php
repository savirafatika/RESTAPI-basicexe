<?php

use GuzzleHttp\Client;

class Mahasiswa_model extends CI_model
{

   private $_client;
   public function __construct()
   {
      $this->_client = new Client([
         'base_uri' => 'http://localhost/rest-api/rest-server/api/',
         'auth' => ['admin', '1234']
      ]);
   }

   public function getAllMahasiswa()
   {
      // return $query = $this->db->get('mahasiswa')->result_array();
      $response = $this->_client->request('GET', 'mahasiswa', [
         'query' => [
            'my-KEY' => 'rest123'
         ]
      ]);

      $result = json_decode($response->getBody()->getContents(), true);
      return $result['data'];
   }

   public function getMahasiswaById($id)
   {
      // return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
      $response = $this->_client->request('GET', 'mahasiswa', [
         'query' => [
            'my-KEY' => 'rest123',
            'id' => $id
         ]
      ]);

      $result = json_decode($response->getBody()->getContents(), true);
      return $result['data']['0'];
   }

   public function tambahDataMahasiswa()
   {
      $data = [
         'nama' => $this->input->post('nama', true),
         'nim' => $this->input->post('nim', true),
         'email' => $this->input->post('email', true),
         'jurusan' => $this->input->post('jurusan', true),
         'my-KEY' => 'rest123'
      ];

      // $this->db->insert('mahasiswa', $data);
      $response = $this->_client->request('POST', 'mahasiswa', [
         'form_params' => $data
      ]);

      $result = json_decode($response->getBody()->getContents(), true);
      return $result;
   }

   public function hapusDataMahasiswa($id)
   {
      // $this->db->delete('mahasiswa', ['id' => $id]);
      $response = $this->_client->request('DELETE', 'mahasiswa', [
         'form_params' => [
            'id' => $id,
            'my-KEY' => 'rest123'
         ]
      ]);

      $result = json_decode($response->getBody()->getContents(), true);
      return $result;
   }

   public function ubahDataMahasiswa()
   {
      $data = [
         'nama' => $this->input->post('nama', true),
         'nim' => $this->input->post('nim', true),
         'email' => $this->input->post('email', true),
         'jurusan' => $this->input->post('jurusan', true),
         'id' => $this->input->post('id', true),
         'my-KEY' => 'rest123'
      ];

      // $this->db->where('id', $this->input->post('id'));
      // $this->db->update('mahasiswa', $data);
      $response = $this->_client->request('PUT', 'mahasiswa', [
         'form_params' => $data
      ]);

      $result = json_decode($response->getBody()->getContents(), true);
      return $result;
   }

   public function cariDataMahasiswa()
   {
      $keyword = $this->input->post('keyword', true);
      $this->db->like('nama', $keyword);
      $this->db->or_like('jurusan', $keyword);
      $this->db->or_like('nim', $keyword);
      $this->db->or_like('email', $keyword);

      return $this->db->get('mahasiswa')->result_array();
   }
}
