<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $table = 'languages';
    protected $fillable = ['id','abbr','active','locale','name','direction','created_at','updated_at'];
    protected $hidden = [];
    public $timestamps = true;

    public function scopeActive($q){
        return $q->where('active',1);
    }

    public function scopeAllLanguages($q){
        return $q->select()->paginate(PAGINATION_COUNT);
    }

    public function getActiveAttribute($q){
        return ($q ==1 ? 'on': 'off');
    }
    public function setActiveAttribute($value){
        $this->attributes['active'] = ($value == 'true'? 1:0);
    }

    // public function getLocaleAttribute($q){
    //     return ($q == null? 'empty': $q);
    // }

    // public function getDirectionAttribute($q){
    //     return ($q == 'rtl'? 'من اليمين الي اليسار': 'من اليسار الي اليمين');
    // }
}
