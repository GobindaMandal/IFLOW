<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ALLOC_DTL extends Model
{
    use HasFactory;

    protected $table = "IF_ALLOC_DTL";
    protected $fillable = [
        'ALLOC_ID',
        'ALLOC_DTL_ID',
        'OFFICE_CODE',
        'ITEM_CODE',
        'ALLOC_QNTY',
        'REMARKS',
        'UNIT_CODE',
        'REQ_QNTY',
        'REQ_ITEM_CODE',
        'PO_NO',
        'REQ_NO',
        'ALLOC_NO'
    ];

    public $timestamps = false;

    protected $primaryKey = 'ALLOC_DTL_ID'; // or null
    public $incrementing = false;
}
