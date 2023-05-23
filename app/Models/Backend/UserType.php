<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $table = "IF_USER_TYPE_MST";
    protected $fillable = [
        'USER_TYPE',
        'USER_TYPE_DESC',
        'STATUS',
        'USER_TYPE_ID'
       
    ];

    public $timestamps = false;

    protected $primaryKey = 'USER_TYPE_ID'; // or null
    public $incrementing = false;
}
