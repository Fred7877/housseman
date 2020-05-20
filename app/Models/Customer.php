<?php

namespace App\Models;

use App\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use Notifiable, Hashidable, SoftDeletes;

    protected $fillable = [
        'address',
        'city',
        'country',
        'email',
        'details',
    ];

    /**
     * Get all of the owning commentable models.
     */
    public function customerable()
    {
        return $this->morphTo();
    }
}
