<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class REQ_MST extends Model
{
    use HasFactory;

    protected $table = "IF_REQ_MST";
    protected $fillable = [
        'REQ_NO',
        'REQ_DATE',
        'OFFICE_CODE',
        'REASON_CODE',
        'REMARKS',
        'REQ_ID',
        'REQ_AMT',
        'LVL_CODE',
        'TRANSACTION_TYPE',
        'LVL1_USER_ID',
        'LVL2_USER_ID',
        'LVL3_USER_ID',
        'LVL4_USER_ID',
        'PROJECT_TYPE',
        'REF_NO',
        'REC_DATE',
        'REC_NO',
        'EMP_CODE'
    ];

    public $timestamps = false;

    protected $primaryKey = 'REQ_ID'; // or null
    public $incrementing = false;
}
