<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model

{
    protected $fillable = ['name', 'date',  'price'];
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    /** @use HasFactory<\Database\Factories\TripFactory> */
    use HasFactory;
}
