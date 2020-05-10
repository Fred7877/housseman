<?php

namespace App\Models;

use App\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    use Hashidable;

    protected $fillable = [
        'libelle',
        'price',
        'details',
    ];
}
