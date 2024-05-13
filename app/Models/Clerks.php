<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clerks extends Model
{

    protected $fillable = ['user_id', 'company_id'];
}
