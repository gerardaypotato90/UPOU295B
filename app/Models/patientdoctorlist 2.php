<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate()
 */
class patientdoctorlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'patientid',
        'doctorid',
        'doctorname',
        'department',
        'appointmentdate',
        'status',
    ];
}
