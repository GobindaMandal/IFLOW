<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OFFICE_LEVEL extends Model
{
    use HasFactory;

    protected $table = "IF_OFFICE_LEVEL";
    protected $fillable = [
        'OFFICE_LEVEL_ID',
        'OFFICE_LEVEL_CODE',
        'OFFICE_LEVEL_DESC',
        'OFFICE_LEVEL_B'
    ];

    public $timestamps = false;

    protected $primaryKey = 'OFFICE_LEVEL_ID'; // or null
    public $incrementing = false;
}
