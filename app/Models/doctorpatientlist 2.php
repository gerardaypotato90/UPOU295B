<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate()
 */
class doctorpatientlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'patientid',
        'doctorid',
        'doctorname',
        'doctorspatientappointmentid',
        'patientname',
        'patientdoctorlistsid',
        'department',
        'appointmentdate',
        'status',
    ];
}
