<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $fillable = ['client_id', 'offer_id', 'purchase_date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    // Relación con el modelo Offer
    public function offer()
    {
        return $this->belongsTo(Offers::class, 'offer_id');
    }
}
