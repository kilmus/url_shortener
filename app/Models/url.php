<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class url extends Model
{
    use HasFactory;

    protected $fillable = [
        'url_old',
        'url_code',
        'url_password',
        'url_count',
    ];
}
