<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Material;
use App\Models\StockInMaterial;
use App\Models\StockOutMaterial;
use CodeIgniter\HTTP\Request;

class ListStockController extends BaseController
{
    private function calculateStockIn($material_id) {
        $stockInModel = new StockInMaterial(); // Ganti dengan model StockIn Anda
        $stock_entries = $stockInModel->where('material_id', $material_id)->findAll();
        
        $stockIn = 0;
        foreach ($stock_entries as $entry) {
            
            $stockIn += $entry['material_in']; // Ganti dengan kolom yang sesuai untuk jumlah stok di setiap entri
        }
    
        return $stockIn;
    }

    private function calculateStockOut($material_id) {
        $stockOut = new StockOutMaterial(); // Ganti dengan model StockIn Anda
        $stock_entries = $stockOut->where('material_id', $material_id)->findAll();
        
        $stockOut = 0;
        foreach ($stock_entries as $entry) {
            
            $stockOut += $entry['material_out']; // Ganti dengan kolom yang sesuai untuk jumlah stok di setiap entri
        }
    
        return $stockOut;
    }

    public function index()
    {
        $data['page_title'] = 'Daftar Stok';
        $model = new Material();
        $data['materials'] = $model->findAll();

        // Stock In
        foreach ($data['materials'] as &$material) {
            $material_id = $material['id']; // Ganti dengan kolom ID yang sesuai pada tabel material Anda
            $totalStockIn = $this->calculateStockIn($material_id); // Fungsi untuk menghitung total stok
            $material['stock_in'] = $totalStockIn;
        }

        // stock Out
        foreach ($data['materials'] as &$material) {
            $material_id = $material['id']; // Ganti dengan kolom ID yang sesuai pada tabel material Anda
            $totalStockIn = $this->calculateStockOut($material_id); // Fungsi untuk menghitung total stok
            $material['stock_out'] = $totalStockIn;
        }

        // dd($data['materials']->stokMasuk);

        // $type = $request->has('type') ? $request->type : 'day';
        // $material = $request->has('material_id') ? $request->material_id : 'All';
        // if ($type == 'day') {
        //     if ($material == 'All') {
        //         $stok = Material::whereDate('created_at', date('Y-m-d'))->get();

        //     }else{
        //         $stok = Material::whereDate('created_at', $request->start_date)->when($request->material_id, function($q) use($request){{
        //             return $q->where('material_id', $request->material_id);
        //          }})->get();
        //     }
        // } elseif ($type == 'monthly') {
        //     $stok = Material::whereMonth('created_at', date('m', strtotime($request->month)))->when($request->material_id, function($q) use($request){{
        //         return $q->where('material_id', $request->material_id);
        //      }})->get();
        // } elseif ($type == 'yearly'){
        //     $stok = Material::whereYear('created_at', $request->year)->when($request->material_id, function($q) use($request){{
        //         return $q->where('material_id', $request->material_id);
        //     }})->get();
        // }
        
        // $data['materials'] = $stok;
        
        return view('inventory/list-stock/index', $data);
    }
}
