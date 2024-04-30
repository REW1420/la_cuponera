<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $fillable = ['unique_code ', 'purchase_id ', 'generation_date'];


}
