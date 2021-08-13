<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// use Illuminate\Contracts\Auth\Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'admins';
    protected $fillable = ['name','password','email','photo','created_at','updated_at'];
    protected $hidden = ['password','remember_token'];
    // public $timestamps = false;
    public function setPasswordAttribute($val){
        $this->attributes['password']= bcrypt($val);
    }
}
