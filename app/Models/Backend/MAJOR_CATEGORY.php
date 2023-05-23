<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MAJOR_CATEGORY extends Model
{
    use HasFactory;

    protected $table = "IF_MAJOR_CATEGORY";
    protected $fillable = [
        'MJR_CAT_CODE',
        'MJR_CAT_DESC',
        'MJR_CAT_ID'
    ];

    public $timestamps = false;

    protected $primaryKey = 'MJR_CAT_ID'; // or null
    public $incrementing = false;

    public function majorSubCat()
    {
        return $this->hasMany(MAJOR_SUB_CATEGORY::class);
    }
}
