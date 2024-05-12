<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'purchase_id',
        'card_number',
        'card_holder',
        'card_expiration',
        'card_cvc',
        'amount'
    ];

    protected $casts = [
        'card_expiration' => 'date', // Asegura que la fecha se maneje correctamente
    ];
}
