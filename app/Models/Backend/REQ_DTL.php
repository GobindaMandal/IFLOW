<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class REQ_DTL extends Model
{
    use HasFactory;

    protected $table = "IF_REQ_DTL";
    protected $fillable = [
        'REQ_ID',
        'ITEM_CODE',
        'QNTY',
        'RATE',
        'AMOUNT',
        'REMARKS',
        'REQ_DTL_ID',
        'UNIT_CODE',
        'ITEM_NAME',
        'REQ_NO'
    ];

    public $timestamps = false;

    protected $primaryKey = 'REQ_DTL_ID'; // or null
    public $incrementing = false;
}
