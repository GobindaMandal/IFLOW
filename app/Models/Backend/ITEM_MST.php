<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ITEM_MST extends Model
{
    use HasFactory;

    protected $table = "IF_ITEM_MST";
    protected $fillable = [
        'ITEM_CODE',
        'ITEM_NAME',
        'DESCRIPTION',
        'UNIT_CODE',
        'DATE_ACTIVE',
        'OPN_BAL',
        'OPN_VAL',
        'REORDER_LEVEL',
        'REMARKS_ITEM',
        'MJR_CAT_CODE',
        'MJR_SUB_CAT_CODE',
        'MNR_SUB_CAT_CODE',
        'ITEM_ID',
        'SL_NO',
        'SHORT_CODE',
        'WARRANTY_PERIOD',
        'BRAND_NAME',
        'BRAND_NAME'
    ];

    public $timestamps = false;

    protected $primaryKey = 'ITEM_ID'; // or null
    public $incrementing = false;

    public function minorSubCat()
    {
        return $this->belongsTo(MINOR_SUB_CATEGORY::class);
    }
}
