<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate()
 */
class department extends Model
{
    use HasFactory;

    protected $fillable = [
        'departmentname',
    ];
}
