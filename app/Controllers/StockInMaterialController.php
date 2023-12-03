<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Material;
use App\Models\StockInMaterial;

class StockInMaterialController extends BaseController
{
    public function index(){
        $data['page_title'] = 'Stock In Material';
        $model = new StockInMaterial();
        // $data['stock_ins'] = $model->findAll();
        $data['stock_ins'] = $model->select('stock_in_materials.*, materials.nama as material_name')
        ->join('materials', 'materials.id = stock_in_materials.material_id')
        ->orderBy('created_at', 'DESC')
        ->findAll();
        return view('inventory/stock-in/index', $data);
    }

    public function create(){
        session();
        $data['page_title'] = 'Create Stock In';
        $data['validation'] = \Config\Services::validation();
        $asset = new StockInMaterial();
        $model = new Material();
        $data['materials'] = $model->findAll();
        return view('inventory/stock-in/create', $data);
    }

    public function store() {

         $validationRules = $this->validate([
            'material_id'    =>'required',
            'material_in'    =>'required',
            'current_stock'    =>'required',
            'description'    =>'required',
        ]);
        try {
            $model = new StockInMaterial();
            $data = [
                'material_id' => $this->request->getPost('material_id'),
                'material_in' => $this->request->getPost('material_in'),
                'current_stock' => $this->request->getPost('current_stock'),
                'description' => $this->request->getPost('description'),
                'created_at' => date('Y-m-d H:i:s')
            ];
    
            $model->insert($data);
    
            session()->setFlashdata('success', 'Stock In created successfully.');
            
            return redirect()->to('/stock-in-material');
            //code...
        } catch (\Throwable $th) {
            session()->setFlashdata('failed', $th->getMessage());
            return redirect()->to('/stock-in-material/create');
            //throw $th;
        }
        
    }

    public function edit($id) {
        $data['page_title'] = 'Edit Stock In Material';
        $stockIn = new StockInMaterial();
        $data['stock_in'] = $stockIn->where('id',$id)->first();
        $model = new Material();
        $data['materials'] = $model->findAll();
        return view('inventory/stock-in/edit', $data);
    }

    public function update($id) {
        $validationRules = $this->validate([
            'material_id'    =>'required',
            'material_in'    =>'required',
            'description'    =>'required',
        ]);

            if (!$validationRules) {
                $validation = \Config\Services::validation();
                return redirect()->to("/material/edit/$id")->withInput();
            }

        try {
            //code...
            $model = new StockInMaterial();
            $data = [
                'material_id' => $this->request->getPost('material_id'),
                'material_in' => $this->request->getPost('material_in'),
                'current_stock' => $this->request->getPost('current_stock'),
                'description' => $this->request->getPost('description'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            
            $model->update($id, $data);
            
            session()->setFlashdata('success', 'Stock In updated successfully.');
            
            // Redirect to a different page or list view
            return redirect()->to('/stock-in-material');
        } catch (\Throwable $th) {
            session()->setFlashdata('success', $th->getMessage());
            return redirect()->to('/stock-in-material/create');
        }
    }

    public function delete($id) {

        $model = new StockInMaterial();

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
