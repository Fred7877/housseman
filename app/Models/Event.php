<?php

namespace App\Models;

use App\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use Hashidable, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'begin' => 'datetime:d/m/Y h:i',
        'end' => 'datetime:d/m/Y h:i',
    ];
}
