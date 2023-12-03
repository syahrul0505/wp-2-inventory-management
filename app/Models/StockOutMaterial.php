<?php

namespace App\Models;

use CodeIgniter\Model;

class StockOutMaterial extends Model
{
    protected $table = 'stock_out_materials';
    protected $primaryKey = 'id';
    protected $allowedFields    = ['material_id','material_out','current_stock','description','created_at','updated_at'];

}
