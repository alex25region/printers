<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPrinter extends Model
{
    protected $table = 'model_printers';
    protected $fillable = [
        'model',
        'image',
    ];

}
