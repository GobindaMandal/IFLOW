<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OFFICE_INFO extends Model
{
    use HasFactory;

    protected $table = "IF_OFFICE_INFO";
    protected $fillable = [
        'PARENT_OFFICE_ID',
        'OFFICE_ID',
        'OFFICE_CODE',
        'OFFICE_DESC',
        'OFFICE_DESC_B',
        'OFFICE_LEVEL_CODE',
        'ADDRESS',
        'ADDRESS_B'
    ];

    public $timestamps = false;

    protected $primaryKey = 'OFFICE_ID'; // or null
    public $incrementing = false;

    public function parent(){
        return $this->belongsTo(OFFICE_INFO::class,'parent_office_id','office_id')->orderBy('office_code', 'asc');
    }
    public function childs(){
        return $this->hasMany(OFFICE_INFO::class,'parent_office_id','office_id')->orderBy('office_code', 'asc');
    }
    public function subChild(){
        return $this->hasMany(OFFICE_INFO::class,'parent_office_id','office_id')->orderBy('office_code', 'asc');
    }
    public function subChild1(){
        return $this->hasMany(OFFICE_INFO::class,'parent_office_id','office_id')->orderBy('office_code', 'asc');
    }
    public function subChild2(){
        return $this->hasMany(OFFICE_INFO::class,'parent_office_id','office_id')->orderBy('office_code', 'asc');
    }
    public function subChild3(){
        return $this->hasMany(OFFICE_INFO::class,'parent_office_id','office_id')->orderBy('office_code', 'asc');
    }
    public function subChild4(){
        return $this->hasMany(OFFICE_INFO::class,'parent_office_id','office_id')->orderBy('office_code', 'asc');
    }
}
