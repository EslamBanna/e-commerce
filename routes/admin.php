<?php

// use App\Http\Controllers\Site\Site;
use App\Http\Controllers\Admin\Admin;
use App\Http\Controllers\Admin\Languages;
use App\Http\Controllers\Admin\MainCatigorieController;
use App\Http\Controllers\Admin\vendorsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

define('PAGINATION_COUNT', 10);
Route::group(['middleware' => 'auth:admin'], function () {
    #################### start dashboard ########################
    Route::get('/', [Admin::class, 'indexPage'])->name('admin.dashboard');
    #################### end dashboard ########################

    #################### start Languages ########################
    Route::group(['prefix' => 'languages'], function () {
        Route::get('/', [Languages::class, 'index'])->name('admin.languages');
        Route::get('/add-language', [Languages::class, 'addLanguage'])->name('add.language');
        Route::post('/insert-language', [Languages::class, 'insertLanguage'])->name('insert.language');
        Route::get('/edit-language/{langID}', [Languages::class, 'editLanguage'])->name('edit.language');
        Route::post('/save-changes-language', [Languages::class, 'saveChangesLanguage'])->name('save.changes.language');
        Route::get('/delete-language/{langID}', [Languages::class, 'deleteLanguage'])->name('delete.language');
        Route::get('/test-general', [Languages::class, 'testLanguage']);
        Route::get('/test-current-lang', [Languages::class, 'testCurrentLanguage']);
    });
    #################### end Languages ########################


    #################### start Main Categories ########################
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [MainCatigorieController::class, 'index'])->name('admin.categories');
        Route::get('/add-categorie', [MainCatigorieController::class, 'addCategorie'])->name('admin.add.categorie');
        Route::post('/insert-categorie', [MainCatigorieController::class, 'insertCategorie'])->name('admin.insert.categorie');
        Route::get('/edit-categorie/{CategorieID}', [MainCatigorieController::class, 'editCategorie'])->name('admin.edit.categorie');
        Route::post('/save-changes-categorie/{CategorieID}', [MainCatigorieController::class, 'saveChangesCategorie'])->name('admin.save.changes.categorie');
        Route::get('/delete-categorie/{CategorieID}', [MainCatigorieController::class, 'deleteCategorie'])->name('admin.delete.categorie');
        Route::get('/change-status/{CategorieID}', [MainCatigorieController::class, 'changeStatus'])->name('admin.status.categorie');
    });
    #################### end Main Categories ########################

    #################### start vendors ########################
    Route::group(['prefix' => 'vendors'], function () {
        Route::get('/', [vendorsController::class, 'index'])->name('admin.vendors.index');
        Route::get('/add-vendor', [vendorsController::class, 'create'])->name('admin.vendors.create');
        Route::post('/insert-vendor', [vendorsController::class, 'store'])->name('admin.vendors.store');
        Route::get('/edit-vendor/{vendorID}', [vendorsController::class, 'edit'])->name('admin.vendors.edit');
        Route::post('/save-changes-vendor/{vendorID}', [vendorsController::class, 'update'])->name('admin.vendors.update');
        Route::get('/delete-vendor/{vendorID}', [vendorsController::class, 'delete'])->name('admin.vendors.delete');
        Route::get('/change-status/{vendorID}', [vendorsController::class, 'status'])->name('admin.vendors.status');
    });


    #################### end vendors ########################

    Route::get('/emails',[HomeController::class,'sendEmails']);
    Route::get('/tanta',function(){
        return 'hello';
    });


});

Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('/login', [Admin::class, 'getLogin'])->name('get.admin.login');
    Route::post('/login', [Admin::class, 'checkLogin'])->name('admin.login');
});

Route::get('/test-map', [vendorsController::class, 'testMap']);
