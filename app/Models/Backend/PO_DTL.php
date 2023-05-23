<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PO_DTL extends Model
{
    use HasFactory;

    protected $table = "IF_PO_DTL";
    protected $fillable = [
        'PO_ID',
        'ITEM_CODE',
        'QNTY',
        'RATE',
        'AMOUNT',
        'REMARKS',
        'UNIT_CODE',
        'PO_DTL_ID',
        'PO_NO'
    ];

    public $timestamps = false;

    protected $primaryKey = 'PO_DTL_ID'; // or null
    public $incrementing = false;
}
