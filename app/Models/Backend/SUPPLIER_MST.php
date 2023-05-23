<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SUPPLIER_MST extends Model
{
    use HasFactory;

    protected $table = "IF_SUPPLIER_MST";
    protected $fillable = [
        'SUPP_NAME',
        'ADDRESS',
        'CONT_PERSON',
        'SUPP_ID',
        'SUPP_CODE',
        'MOBILE_NO',
        'EMAIL_ADDR'
    ];

    public $timestamps = false;

    protected $primaryKey = 'SUPP_ID'; // or null
    public $incrementing = false;
}
