<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $guarded = [
        'portfolio_id'
    ];

    protected $fillable = ['nama', 'nim', 'email', 'phone', 'image',];
}