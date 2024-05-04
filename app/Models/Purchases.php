<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $fillable = ['client_id', 'offer_id', 'purchase_date'];


}
