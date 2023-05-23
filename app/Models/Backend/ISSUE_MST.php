<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ISSUE_MST extends Model
{
    use HasFactory;

    protected $table = "IF_ISSUE_MST";
    protected $fillable = [
        'ISSUE_NO',
        'ISSUE_DATE',
        'OFFICE_CODE',
        'ISSUE_AMT',
        'REMARKS',
        'ISSUE_ID',
        'ALLOC_NO',
        'CREATE_DATE',
        'TRANSACTION_TYPE',
        'LVL1_USER_ID',
        'LVL2_USER_ID',
        'LVL3_USER_ID',
        'LVL4_USER_ID',
        'USER_OFFICE_CODE',
        'REF_NO',
        'PROJECT_TYPE',
        'EMP_CODE'
    ];

    public $timestamps = false;

    protected $primaryKey = 'ISSUE_ID'; // or null
    public $incrementing = false;
}
