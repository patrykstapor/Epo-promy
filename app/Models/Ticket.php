<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['price', 'is_active', 'from', 'to'];
    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory;
}
