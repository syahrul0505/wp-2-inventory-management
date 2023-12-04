<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Material;
use App\Models\StockOutMaterial;

class StockOutMaterialController extends BaseController
{
    public function index(){
        $data['page_title'] = 'Stock Out Material';
        $model = new StockOutMaterial();
        // $data['stock_ins'] = $model->findAll();
        $data['stock_outs'] = $model->select('stock_out_materials.*, materials.nama as material_name')
        ->join('materials', 'materials.id = stock_out_materials.material_id')
        ->orderBy('created_at', 'DESC')
        ->findAll();
        return view('inventory/stock-out/index', $data);
    }

    public function create(){
        session();
        $data['page_title'] = 'Create Stock Out';
        $data['validation'] = \Config\Services::validation();
        $asset = new StockOutMaterial();
        $model = new Material();
        $data['materials'] = $model->findAll();
        return view('inventory/stock-out/create', $data);
    }

    public function store() {

         $validationRules = $this->validate([
            'material_id'    =>'required',
            'material_out'    =>'required',
            'description'    =>'required',
        ]);

        
        if (!$validationRules) {
            $validation = \Config\Services::validation();
            return redirect()->to("/stock-out-material/create")->withInput();
        }

        try {
            $model = new StockOutMaterial();
            $data = [
                'material_id' => $this->request->getPost('material_id'),
                'material_out' => $this->request->getPost('material_out'),
                'description' => $this->request->getPost('description'),
                'created_at' => date('Y-m-d H:i:s')
            ];
    
            $model->insert($data);
    
            session()->setFlashdata('success', 'Stock Out created successfully.');
            
            return redirect()->to('/stock-out-material');
            //code...
        } catch (\Throwable $th) {
            session()->setFlashdata('failed', $th->getMessage());
            return redirect()->to('/stock-out-material/create');
            //throw $th;
        }
        
    }

    public function edit($id) {
        $data['page_title'] = 'Edit Stock In Material';
        $stockIn = new StockOutMaterial();
        $data['stock_out'] = $stockIn->where('id',$id)->first();
        $model = new Material();
        $data['materials'] = $model->findAll();
        return view('inventory/stock-out/edit', $data);
    }

    public function update($id) {
        $validationRules = $this->validate([
            'material_id'    =>'required',
            'material_out'    =>'required',
            'description'    =>'required',
        ]);

            if (!$validationRules) {
                $validation = \Config\Services::validation();
                return redirect()->to("/stock-out-material/edit/$id")->withInput();
            }

        try {
            //code...
            $model = new StockOutMaterial();
            $data = [
                'material_id' => $this->request->getPost('material_id'),
                'material_out' => $this->request->getPost('material_out'),
                'description' => $this->request->getPost('description'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            
            $model->update($id, $data);
            
            session()->setFlashdata('success', 'Stock Out updated successfully.');
            
            // Redirect to a different page or list view
            return redirect()->to('/stock-out-material');
        } catch (\Throwable $th) {
            session()->setFlashdata('success', $th->getMessage());
            return redirect()->to('/stock-out-material/create');
        }
    }

    public function delete($id) {

        $model = new StockOutMaterial();

        if ($model->delete($id)) {
            $response = [
                'success' => true,
                'message' => 'Stock In deleted successfully.',
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
