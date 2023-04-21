<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate()
 */
class doctorslist extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctorid',
        'doctorname',
        'department',
        'availabledays',
        'availabletime',
    ];
}
