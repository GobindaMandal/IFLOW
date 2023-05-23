<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ALLOC_MST extends Model
{
    use HasFactory;

    protected $table = "IF_ALLOC_MST";
    protected $fillable = [
        'ALLOC_ID',
        'ALLOC_NO',
        'ALLOC_DATE',
        'REMARKS',
        'ALLOC_AMT',
        'OFFICE_CODE',
        'LVL_CODE',
        'PO_NO',
        'PROJECT_TYPE',
        'REF_NO'
    ];

    public $timestamps = false;

    protected $primaryKey = 'ALLOC_ID'; // or null
    public $incrementing = false;
}
