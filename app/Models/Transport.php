<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'vechile_no',
        'vechile_model',
        'made_year',
        'driver_name',
        'driver_license',
        'driver_contact'
    ];
}
