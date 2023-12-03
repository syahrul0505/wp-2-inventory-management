<?php

namespace App\Models;

use CodeIgniter\Model;

class StockInMaterial extends Model
{
    protected $table = 'stock_in_materials';
    protected $primaryKey = 'id';
    protected $allowedFields    = ['material_id','material_in','current_stock','description','created_at','updated_at'];
}
