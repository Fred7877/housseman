<?php

namespace App\Models;

use App\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quote extends Model
{
    use Hashidable, SoftDeletes;

    protected $guarded = [];
}
