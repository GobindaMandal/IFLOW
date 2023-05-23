<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class USER_MST extends Model
{
    use HasFactory;

    protected $table = "IF_USER_MST";
    protected $fillable = [
        'USER_ID',
        'NAME',
        'USER_NAME',
        'USER_PASSWORD',
        'MOBILE',
        'EMAIL',
        'USER_TYPE',
        'ORG_CODE',
        'OFFICE_CODE',
        'GRP_CODE',
        'DESIGNATION',
        'USER_CODE'
    ];

    public $timestamps = false;

    protected $primaryKey = 'USER_ID'; // or null
    public $incrementing = false;
}
