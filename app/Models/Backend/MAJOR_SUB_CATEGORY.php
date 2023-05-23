<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MAJOR_SUB_CATEGORY extends Model
{
    use HasFactory;

    protected $table = "IF_MAJOR_SUB_CATEGORY";
    protected $fillable = [
        'MJR_SUB_CAT_CODE',
        'MJR_SUB_CAT_DESC',
        'MJR_SUB_CAT_ID'
    ];

    public $timestamps = false;

    protected $primaryKey = 'MJR_SUB_CAT_ID'; // or null
    public $incrementing = false;

    public function majorCat()
    {
        return $this->belongsTo(MAJOR_CATEGORY::class);
    }
    public function minorSubCat()
    {
        return $this->hasMany(MINOR_SUB_CATEGORY::class);
    }
}
