<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SUPP_PRODUCT_DTL extends Model
{
    use HasFactory;

    protected $table = "IF_SUPP_PRODUCT_DTL";
    protected $fillable = [
        'SUPP_CODE',
        'ITEM_CODE',
        'LAST_PUR_DATE',
        'LAST_PUR_RATE',
        'SUPP_PROD_ID'
    ];

    public $timestamps = false;

    protected $primaryKey = 'SUPP_PROD_ID'; // or null
    public $incrementing = false;
}
