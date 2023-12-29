<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAkun extends Model
{
    protected $fillable = [
        'username',
        'password',
        '_token',
    ];
}
