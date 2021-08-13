<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\addLanguagesRequest;
use App\Models\Language;
use Illuminate\Http\Request;

class Languages extends Controller
{
    public function index()
    {
        $languages = Language::allLanguages();
        return view('admin.languages.index', compact('languages'));
    }
    public function addLanguage()
    {
        return view('admin.languages.addLanguage');
    }

    public function insertLanguage(addLanguagesRequest $request)
    {
        // return $request;
        try{
        Language::create([
            'name' => $request->name,
            'abbr' => $request->abbr,
            'direction' => $request->direction,
            'active' => $request->active,
            'locale' => $request->locale,
        ]);
        return redirect()->route('admin.languages')->with(['successAdd' => 'تمت الاضافة بنجاح']);
        } catch(\Exception $ex){
            return redirect()->route('admin.languages')->with(['error' => 'هناك خطأ في العملية']);
        }
    }

    public function editLanguage($langID)
    {
        $language = Language::find($langID);
        if (!$language)
            return redirect()->route('admin.languages');

        $lang = Language::select()->findorFail($langID);
        return view('admin.languages.editLanguage', compact('lang'));
    }

    public function saveChangesLanguage(addLanguagesRequest $request){

        // return $request;
        $lang = Language::find($request->id);
        if (!$lang)
            return redirect()->route('admin.languages');

            $lang->update($request->all());
            return redirect()->route('admin.languages');
        }

    public function deleteLanguage($langID)
    {
        $language = Language::find($langID);
        if (!$language)
            return redirect()->route('admin.languages');

        $language->delete();
        return redirect()->route('admin.languages');
    }


    public function testLanguage(){
        return getAllActiveLanguages();
    }

   public function testCurrentLanguage(){
       return CurrentLang();
   }
}
