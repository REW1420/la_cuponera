<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $fillable = [
        'title',
        'regular_price',
        'offer_price',
        'start_date',
        'end_date',
        'coupon_usage_limit_date',
        'coupon_limit_quantity',
        'description',
        'other_details',
        'status',
        'company_id',
    ];
}
