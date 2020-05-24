<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    protected $table='printers';

    protected $fillable = [
        'model_id',
        'ipaddress',
        'name',
        'description',
        'comment',
        'file',
        'inv_number'
    ];

    public function getModel() {
        return $this->hasOne(ModelPrinter::class, 'id', 'model_id');
    }

}
