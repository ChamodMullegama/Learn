<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'Product_name',
        'des',
        'qut',
        'image_path',
    ];
}
