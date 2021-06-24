<?php

namespace App\Controllers;

use App\Models\SampahModel;

class Sampah extends BaseController
{

   public function index()
   {
      $sampah = new SampahModel();

      $data['sampah'] = $sampah->findAll();
      return view('sampah/sampah', $data);
   }

   public function create()
   {
      return view('sampah/create');
   }

   public function store()
   {
      $request = service('request');
      $postData = $request->getPost();

      if (isset($postData)) {

         $input = $this->validate([
            'nama_wilayah' => 'required',
            'jenis_sampah' => 'required',
            'berat' => 'required',
            'tinggi' => 'required'
         ]);

         if (!$input) {
            return redirect()->to('sampah/create')->withInput()->with('validation', $this->validator);
         } else {

            $sampah = new SampahModel();

            $data = [
               'nama_wilayah' => $postData['nama_wilayah'],
               'jenis_sampah' => $postData['jenis_sampah'],
               'berat' => $postData['berat'],
               'tinggi' => $postData['tinggi']
            ];

            if ($sampah->insert($data)) {
               session()->setFlashdata('message', 'Added Successfully!');
               session()->setFlashdata('alert-class', 'alert-success');

               return redirect()->to('sampah');
            } else {
               session()->setFlashdata('message', 'Data not saved!');
               session()->setFlashdata('alert-class', 'alert-danger');

               return redirect()->to('sampah/create')->withInput();
            }
         }
      }
   }

   public function edit($id_wilayah)
   {

      $sampah = new SampahModel();
      $sampah = $sampah->find($id_wilayah);

      $data['sampah'] = $sampah;
      return view('sampah/edit', $data);
   }

   public function update($id_wilayah = 0)
   {
      $request = service('request');
      $postData = $request->getPost();
      // var_dump($postData);

      if (isset($postData)) {
         $input = $this->validate([
            'nama_wilayah' => 'required',
            'jenis_sampah' => 'required',
            'berat' => 'required',
            'tinggi' => 'required'
         ]);

         if (!$input) {
            return redirect()->to('sampah/edit/' . $id_wilayah)->withInput()->with('validation', $this->validator);
         } else {

            $sampah = new SampahModel();

            $data = [
               'nama_wilayah' => $postData['nama_wilayah'],
               'jenis_sampah' => $postData['jenis_sampah'],
               'berat' => $postData['berat'],
               'tinggi' => $postData['tinggi']
            ];

            if ($sampah->update($id_wilayah, $data)) {
               session()->setFlashdata('message', 'Updated Successfully!');
               session()->setFlashdata('alert-class', 'alert-success');

               return redirect()->to('sampah');
            } else {
               session()->setFlashdata('message', 'Data not saved!');
               session()->setFlashdata('alert-class', 'alert-danger');

               return redirect()->to('sampah/edit/' . $id_wilayah)->withInput();
            }
         }
      }
   }

   public function delete($id_wilayah = 0)
   {

      $sampah = new SampahModel();

      if ($sampah->find($id_wilayah)) {

         $sampah->delete($id_wilayah);

         session()->setFlashdata('message', 'Deleted Successfully!');
         session()->setFlashdata('alert-class', 'alert-success');
      } else {
         session()->setFlashdata('message', 'Record not found!');
         session()->setFlashdata('alert-class', 'alert-danger');
      }

      return redirect()->to('sampah');
   }
}
