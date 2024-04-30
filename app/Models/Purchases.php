<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = ['client_id', 'offer_id', 'purchase_date'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'client_id');
    }

    public function oferta()
    {
        return $this->belongsTo(Oferta::class, 'offer_id');
    }
}
