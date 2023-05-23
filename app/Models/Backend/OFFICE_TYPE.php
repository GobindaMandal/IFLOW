<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OFFICE_TYPE extends Model
{
    use HasFactory;

    protected $table = "IF_OFFICE_TYPE";
    protected $fillable = [
        'OFFICE_TYPE',
        'OFFICE_TYPE_DESC'
    ];

    public $timestamps = false;

    protected $primaryKey = ''; // or null
    public $incrementing = false;
}
