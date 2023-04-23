<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate()
 */
class upload extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctorid',
        'doctorname',
        'patientid',
        'patientname',
        'imagename',
        'diagnostic',
        'size',
    ];
}
