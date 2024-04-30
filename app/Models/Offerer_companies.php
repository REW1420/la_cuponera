<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaOfertante extends Model
{
    protected $fillable = ['name', 'code', 'address', 'contact_name', 'phone', 'email', 'category_id', 'commission'];

}
