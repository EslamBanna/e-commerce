<?php

namespace App\Models\vendors;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Vendor extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $table = 'vendors';
    protected $fillable =['password','name','phone','address','email','active','logo','catigory_id','lng','lat'];
    protected $hidden =['updated_at','created_at'];
    public $timestamps = false;


    public function scopeSelection($query){
        return $query->select('id','name','email','phone','address','active','logo','catigory_id','lng','lat');
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    // public function getActiveAttribute($q){
    //     return ($q ==1 ? 'مفعل': 'غير مفعل');
    // }

    public function getActive(){
        return ($this->active ==1 ? 'مفعل' : 'غير مفعل');
    }

    public function mainCategory(){
        return $this->belongsTo('App\Models\categories\MainCatigorie','catigory_id','id');
    }
}
