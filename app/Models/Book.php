<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_name',
        'subject',
        'book_no',
        'quantity',
        'price',
        'rack_no',
        'is_issued'
    ];
}
