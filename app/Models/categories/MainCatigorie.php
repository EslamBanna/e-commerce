<?php

namespace App\Models\categories;

use App\Models\Language;
use App\Observers\mainCategoriesObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCatigorie extends Model
{
    use HasFactory;
    protected $table = 'main_categories';
    protected $fillable = ['id','translation_lang','active','translation_of','name','slug','photo'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;
    protected static function boot(){
        parent::boot();
        MainCatigorie::observe(mainCategoriesObserver::class);

    }
    public function translation(){
        return $this->hasMany(self::class, 'translation_of');
    }
    // public function scopeMainCat($q){
    //     return $q->where('translation_of',$q->id);
    // }

    public function scopeActive($q){
        return $q->where('active',1);
    }

    public function scopeAllCategories($q){
        return $q->select('id','translation_lang','slug','active','name','slug','photo');
    }

    public function getPhotoAttribute($q){
        return ($q == null? "": 'assets/'.$q);
    }
    function getTranslationLangAttribute($val){
        return Language::select('name')->where('abbr', $val)->get()[0]->name;
        // return (App\Models\Language::where('abbr',$val)->select('direction'));
    }

    public function vendors(){
        return $this->hasMany('App\Models\vendors\Vendor','catigory_id','id');
    }
}
