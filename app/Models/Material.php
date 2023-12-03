<?php

namespace App\Models;

use CodeIgniter\Model;

class Material extends Model
{
    protected $table = 'materials';
    protected $primaryKey = 'id';
    protected $allowedFields    = ['code','nama','unit','description','created_at','updated_at'];

    public function stockIns()
    {
        return $this->hasMany('App\Models\StockInMateial', 'material_id', 'id');
    }
    
}
