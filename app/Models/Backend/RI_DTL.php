<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RI_DTL extends Model
{
    use HasFactory;

    protected $table = "IF_RI_DTL";
    protected $fillable = [
        'RI_ID',
        'ITEM_CODE',
        'RATE_ITEM',
        'QUANTITY_ACCEPTED',
        'AMOUNT_ACCEPTED',
        'QUANTITY_DISPUTED',
        'AMOUNT_DISPUTED',
        'REMARKS',
        'UNIT_CODE',
        'RI_DTL_ID',
        'PO_QNTY',
        'WARRANTY_PERIOD',
        'PO_NO',
        'RI_NO',
        'QUANTITY_RECEIVED',
        'RATE'
    ];

    public $timestamps = false;

    protected $primaryKey = 'RI_DTL_ID'; // or null
    public $incrementing = false;
}
