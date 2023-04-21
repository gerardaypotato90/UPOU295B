<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate()
 */
class doctorspatientappointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patientid',
        'doctorid',
        'doctorspatientappointmentid',
        'patientname',
        'department',
        'appointmentdate',
        'status',
    ];
}
