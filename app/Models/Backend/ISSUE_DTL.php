<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ISSUE_DTL extends Model
{
    use HasFactory;

    protected $table = "IF_ISSUE_DTL";
    protected $fillable = [
        'ISSUE_ID',
        'ITEM_CODE',
        'ISSUE_QNTY',
        'RATE',
        'AMOUNT',
        'REMARKS',
        'ALLOC_QNTY',
        'UNIT_CODE',
        'ISSUE_DTL_ID',
        'ALLOC_NO',
        'ISSUE_NO'
    ];

    public $timestamps = false;

    protected $primaryKey = 'ISSUE_DTL_ID'; // or null
    public $incrementing = false;
}
