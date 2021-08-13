<?php

namespace App\Models\EmailTest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;

    protected $table = 'mails';
    protected $fillable = ['id','name','email','phone'];
    protected $hidden = [];
    public $timestamps = false;

}
