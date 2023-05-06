<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate()
 */
class pnotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctorid',
        'patientid',
        'doctorname',
        'patientname',
        'message',
    ];
}
