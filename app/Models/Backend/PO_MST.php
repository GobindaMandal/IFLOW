<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PO_MST extends Model
{
    use HasFactory;

    protected $table = "IF_PO_MST";
    protected $fillable = [
        'PO_NO',
        'PO_DATE',
        'SUPP_CODE',
        'PO_AMT',
        'REMARKS',
        'PO_ID',
        'STATUS',
        'CREATE_BY',
        'CREATE_DATE',
        'UPDATE_BY',
        'UPDATE_DATE',
        'DELIVERY_DATE',
        'DELIVERY_OFFICE',
        'LVL_CODE',
        'TRANSACTION_TYPE',
        'LVL1_USER_ID',
        'LVL2_USER_ID',
        'LVL3_USER_ID',
        'LVL4_USER_ID',
        'OFFICE_CODE',
        'PROJECT_TYPE',
        'REF_NO'
    ];

    public $timestamps = false;

    protected $primaryKey = 'PO_ID'; // or null
    public $incrementing = false;
}