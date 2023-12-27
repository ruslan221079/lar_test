<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;


    protected $fillable = [
        'id', 'num', 'title', 'original_url', 'shortener_url'
    ];
}
