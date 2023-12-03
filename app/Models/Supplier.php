<?php

namespace App\Models;

use CodeIgniter\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'id';
    protected $allowedFields    = ['supplier_name','telephone','email','address','description','created_at','updated_at'];
}
