<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RI_MST extends Model
{
    use HasFactory;

    protected $table = "IF_RI_MST";
    protected $fillable = [
        'RI_NO',
        'RI_DATE',
        'AMOUNT_ACCEPTED',
        'AMOUNT_DISPUTED',
        'REMARKS',
        'RI_ID',
        'PO_NO',
        'TRANSACTION_TYPE',
        'OFFICE_CODE',
        'REF_NO',
        'PROJECT_TYPE'
    ];

    public $timestamps = false;

    protected $primaryKey = 'RI_ID'; // or null
    public $incrementing = false;
}
