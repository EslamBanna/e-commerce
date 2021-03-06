<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CatigoriRequest;
use App\Models\categories\MainCatigorie;
use Illuminate\Http\Request;
use DB;

class MainCatigorieController extends Controller
{
    public function index()
    {
        $categories = MainCatigorie::allCategories()->where('translation_lang', CurrentLang())->get();
        return view('admin.MainCategories.index', compact('categories'));
    }
    public function addCategorie()
    {
        return view('admin.MainCategories.addCategorie');
    }

    public function insertCategorie(CatigoriRequest $request)
    {
        try {
            $main_catigories = collect($request->category);
            $filter = $main_catigories->filter(function ($value, $key) {
                return ($value['translation_lang'] == CurrentLang());
            });
            $defalut_category = array_values($filter->all())[0];
            $file_name = "";
            $active = 0;
            if ($request->has('photo')) {
                $file_name  = saveImage($request->photo, 'mainCategories');
            }

            DB::beginTransaction();
            $defalut_category_id = MainCatigorie::insertGetId([
                'name' => $defalut_category['name'],
                'translation_lang' => $defalut_category['translation_lang'],
                'translation_of' => 0,
                'photo' => $file_name,
                'active' => $request['active'],
                'slug' =>  $defalut_category['slug']
            ]);
            MainCatigorie::where('id', $defalut_category_id)->update(['translation_of' => $defalut_category_id]);
            $categories = $main_catigories->filter(function ($value, $key) {
                return ($value['translation_lang'] != CurrentLang());
            });
            if (isset($categories) && $categories->count() >= 1) {
                $categories_array = [];
                foreach ($categories as $category) {
                    $categories_array[] = [
                        'name' => $category['name'],
                        'translation_lang' => $category['translation_lang'],
                        'translation_of' => $defalut_category_id,
                        'photo' => $file_name,
                        'active' => $request['active'],
                        'slug' =>  $category['slug']
                    ];
                }
                MainCatigorie::insert($categories_array);
            }

            DB::commit();
            return redirect()->route('admin.categories')->with(['successAdd' => '?????? ?????????????? ??????????']);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.categories')->with(['error' => '???????? ?????? ???? ??????????????']);
        }
    }

    public function editCategorie($CategorieID)
    {
        $mainCategories = MainCatigorie::find($CategorieID);
        if (!$mainCategories)
            return redirect()->route('admin.categories')->with(['error' => '?????? ?????????? ?????? ??????????']);

        $catigory_with_diffrent_languages = MainCatigorie::where('translation_of', '=', $CategorieID)
            ->where('id', '!=', $CategorieID)
            ->select()->get();

        // return $catigory_with_diffrent_languages;
        return view('admin.MainCategories.editCategorie', compact('mainCategories', 'catigory_with_diffrent_languages'));
    }

    public function saveChangesCategorie(Request $request, $CategorieID)
    {
        // return $CategorieID;
        // return $request;
        $mainCategory = MainCatigorie::find($CategorieID);
        if (!$mainCategory)
            return redirect()->route('admin.categories')->with(['error' => '?????? ?????????? ?????? ??????????']);

        try {
            DB::beginTransaction();
            if ($request->has('photo')) {
                $file_name  = saveImage($request->photo, 'mainCategories');

                $mainCategory->update([
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'active' => $request->active,
                    'photo' => $file_name,
                ]);
            } else {
                if ($request->has('active')) {
                    $mainCategory->update([
                        'name' => $request->name,
                        'slug' => $request->slug,
                        'active' => $request->active
                    ]);
                } else {
                    $mainCategory->update([
                        'name' => $request->name,
                        'slug' => $request->slug,
                    ]);
                }
            }
            //////
            MainCatigorie::where('translation_of', $CategorieID)
                ->update([
                    'active' => $request->active
                ]);
            DB::commit();
            return redirect()->route('admin.categories')->with(['success' => '???? ?????????????? ??????????']);
        } catch (\Exception $ex) {
            return $ex;
            DB::rollback();
            return redirect()->route('admin.categories')->with(['error' => '?????? ?????? ???? ???? ??????????????']);
        }
        // return $request;




    }

    public function deleteCategorie($CategorieID)
    {
        try {
            $mainCategory = MainCatigorie::find($CategorieID);
            if (!$mainCategory)
                return redirect()->route('admin.categories')->with(['error' => '?????? ?????????? ?????? ??????????']);

            $vendors = $mainCategory->vendors();
            if (isset($vendors) && $vendors->count() > 0) {
                return redirect()->route('admin.categories')->with(['error' => '???????? ???????????? ?????? ?????? ??????????']);
            }
            // return $mainCategory ->photo;
            $mainCategory -> translation()->delete();
            unlink($mainCategory->photo);
            $mainCategory->delete();
            return redirect()->route('admin.categories')->with(['success' => '???? ?????? ?????????? ??????????']);
        } catch (\Exception $ex) {
            // return $ex;
            return redirect()->route('admin.categories')->with(['error' => '???????? ???????? ?????? ???? ????????????']);
        }
    }

    public function changeStatus($CategorieID){
        // return $CategorieID;
        $mainCategory = MainCatigorie::find($CategorieID);
        if(! $mainCategory){
            return redirect()->route('admin.categories')->with(['error' => '?????? ?????????? ?????? ??????????']);
        }
        try{
            DB::beginTransaction();
            $mainCategory ->update([
                'active' => !$mainCategory->active
            ]);
            // $mainCategory -> active =  !$mainCategory->active;
            DB::commit();
            return redirect()->route('admin.categories')->with(['success' => '???? ?????????? ?????????? ??????????']);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('admin.categories')->with(['error' => '???????? ???????? ?????? ???? ????????????']);
        }
    }

}
