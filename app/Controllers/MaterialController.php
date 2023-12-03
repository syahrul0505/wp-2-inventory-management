<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Material;

class MaterialController extends BaseController
{
    public function index(){
        $data['page_title'] = 'Material';
        $model = new Material();
        $data['materials'] = $model->findAll();
        return view('master-data/material/index', $data);
    }

    public function create(){
        session();
        $data['page_title'] = 'Create Material';
        $data['validation'] = \Config\Services::validation();
        return view('master-data/material/create', $data);
    }

    public function store() {

         $validationRules = $this->validate([
            'code'    =>'required',
            'nama'    =>'required',
            'unit'    =>'required',
        ]);

        if (!$validationRules) {
            $validation = \Config\Services::validation();
            return redirect()->to("/material/create")->withInput();
        }
        
        $model = new Material();
        $data = [
            'code' => $this->request->getPost('code'),
            'nama' => $this->request->getPost('nama'),
            'unit' => $this->request->getPost('unit'),
            'description' => $this->request->getPost('description'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $model->insert($data);

        session()->setFlashdata('success', 'Record has been created successfully.');

        return redirect()->to('/material');
        
    }

    public function edit($id) {
        $data['title'] = 'Edit Material';
        $model = new Material();
        $data['material'] = $model->where('id',$id)->first();
        return view('master-data/material/edit', $data);
    }

    public function update($id) {
        $validationRules = $this->validate([
            'code'    =>'required',
            'nama'    =>'required',
            'unit'    =>'required',
        ]);

        if (!$validationRules) {
            $validation = \Config\Services::validation();
            return redirect()->to("/material/edit/$id")->withInput();
        }

        $model = new Material();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'code' => $this->request->getPost('code'),
            'unit' => $this->request->getPost('unit'),
            'description' => $this->request->getPost('description'),
            'updated_ad' => date('Y-m-d H:i:s')
        ];

        $model->update($id, $data);

        session()->setFlashdata('success', 'Material has been updated successfully.');

        // Redirect to a different page or list view
        return redirect()->to('/material');
    }

    public function delete($id) {

        $model = new Material();

        if ($model->delete($id)) {
            $response = [
                'success' => true,
                'message' => 'Record has been deleted successfully.',
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to delete the record.',
            ];
        }

        // Set the flash message for the session
        session()->setFlashdata('success', $response['message']);

        // Return a JSON response
        return $this->response->setJSON($response);
    }
}
