<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    use HasFactory;

    protected $table = "ticket";

    protected $fillable = [
        'event_id',
        'ticket_id',
        'ticket_number',
        'price',
    ];
}
