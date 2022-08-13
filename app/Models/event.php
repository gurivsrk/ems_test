<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class event extends Model
{
    use HasFactory;

    protected $table = 'event';

    protected $fillable= [
        'event_name',
        'organizer',
        'start_date',
        'end_date',
        'event_description'
    ];

    protected function startDate(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => date($value),
        );
    }
}
