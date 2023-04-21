<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate()
 */
class doctorsschedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctorslistid',
        'day',
        'doctor',
        'time',
    ];
}
