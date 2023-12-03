<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Supplier;

class SupplierController extends BaseController
{
    public function index(){
        $data['page_title'] = 'Supplier';
        $model = new Supplier();
        $data['suppliers'] = $model->findAll();
        return view('master-data/supplier/index', $data);
    }

    public function create(){
        session();
        $data['page_title'] = 'Create Supplier';
        $data['validation'] = \Config\Services::validation();
        return view('master-data/supplier/create', $data);
    }

    public function store() {

         $validationRules = $this->validate([
            'supplier_name'    =>'required',
            'telephone'    =>'required',
            'email'    =>'required',
        ]);

        if (!$validationRules) {
            $validation = \Config\Services::validation();
            return redirect()->to("/supplier/create")->withInput();
        }
        
        try {
            //code...
        
        $model = new Supplier();
        $data = [
            'supplier_name' => $this->request->getPost('supplier_name'),
            'telephone' => $this->request->getPost('telephone'),
            'email' => $this->request->getPost('email'),
            'address' => $this->request->getPost('address'),
            'description' => $this->request->getPost('description'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $model->insert($data);

        session()->setFlashdata('success', 'Supplier created successfully.');

        return redirect()->to('/supplier');
    } catch (\Throwable $th) {
        dd($th->getMessage());
        session()->setFlashdata('failed', $th->getMessage());

        return redirect()->to('/supplier/create');
    }
        
    }

    public function edit($id) {
        $data['title'] = 'Edit Supplier';
        $model = new Supplier();
        $data['supplier'] = $model->where('id',$id)->first();
        return view('master-data/supplier/edit', $data);
    }

    public function update($id) {
        $validationRules = $this->validate([
            'supplier_name'    =>'required',
            'telephone'    =>'required',
            'email'    =>'required',
        ]);

        if (!$validationRules) {
            $validation = \Config\Services::validation();
            return redirect()->to("/spplier/edit/$id")->withInput();
        }

        try {
            //code...
            $model = new Supplier();
            $data = [
                'supplier_name' => $this->request->getPost('supplier_name'),
                'telephone' => $this->request->getPost('telephone'),
                'email' => $this->request->getPost('email'),
                'address' => $this->request->getPost('address'),
                'description' => $this->request->getPost('description'),
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            $model->update($id, $data);
            
            session()->setFlashdata('success', 'Supplier has been updated successfully.');
            
            // Redirect to a different page or list view
            return redirect()->to('/supplier');
        } catch (\Throwable $th) {
            session()->setFlashdata('failed', $th->getMessage());
            return redirect()->to('/supplier');
        }
    }

    public function delete($id) {

        $model = new Supplier();

        if ($model->delete($id)) {
            $response = [
                'success' => true,
                'message' => 'Supplier deleted successfully.',
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
