<?php

namespace App\Models;

use App\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Organization extends Model
{
    use Notifiable, Hashidable;

    protected $fillable = [
        'contact_first_name',
        'contact_last_name',
        'siret',
        'name',
    ];

    public function customer()
    {
        return $this->morphOne(Customer::class, 'customerable');
    }
}
