<?php

// use App\Models\Language;
use Illuminate\Support\Facades\Config;

function getAllActiveLanguages(){
    return \App\Models\Language::active()->select('abbr','id','name')->get();
}

function CurrentLang(){
    return Config::get('app.locale');
}

function saveImage1($photo,$path){
    $fil_extiention = $photo -> getClientOriginalExtension();
    $file_name = time().'.'.$fil_extiention;
    $path_name = $path;
    $photo -> move($path_name,$file_name);
    return  $file_name;

}
    //another way################
function saveImage($photo,$folder){
    $photo ->store('/',$folder);
    $filename = $photo->hashName();
    $path = 'images/'.$folder.'/'.$filename;
    return $path;
}

