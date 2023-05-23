<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MINOR_SUB_CATEGORY extends Model
{
    use HasFactory;

    protected $table = "IF_MINOR_SUB_CATEGORY";
    protected $fillable = [
        'MNR_SUB_CAT_CODE',
        'MNR_SUB_CAT_DESC',
        'MNR_SUB_CAT_ID'
    ];

    public $timestamps = false;

    protected $primaryKey = 'MNR_SUB_CAT_ID'; // or null
    public $incrementing = false;

    public function majorSubCat()
    {
        return $this->belongsTo(MAJOR_SUB_CATEGORY::class);
    }
    public function item()
    {
        return $this->hasMany(ITEM_MST::class);
    }
}
