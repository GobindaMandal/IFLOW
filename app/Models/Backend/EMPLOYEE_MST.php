<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EMPLOYEE_MST extends Model
{
    use HasFactory;

    protected $table = "IF_EMPLOYEE";
    protected $fillable = [
        'EMPLOYEE_ID',
        'OFFICE_CODE',
        'EMPLOYEE_CODE',
        'NAME',
        'DESIGNATION'
    ];

    public $timestamps = false;

    protected $primaryKey = 'EMPLOYEE_ID'; // or null
    public $incrementing = false;
}
