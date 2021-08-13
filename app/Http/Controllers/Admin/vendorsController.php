<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Models\categories\MainCatigorie;
use App\Models\vendors\Vendor;
use App\Notifications\notifyVendor;
use Illuminate\Http\Request;
use DB;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Auth;
use Illuminate\Support\Facades\Http;

class vendorsController extends Controller
{
    public function index()
    {
        $vendors = Vendor::selection()->with(['mainCategory' => function ($q) {
            $q->select('id', 'name')->get();
        }])->where('active', 1)->paginate(PAGINATION_COUNT);
        //    return $vendors;
        return view('admin.vendors.index', compact('vendors'));
    }
    public function create()
    {
        // return $request;
        // $currentLocation =  Http::get('https://api.tomtom.com/search/2/reverseGeocode/30.7817298%2C31.025758099999997.json?key=oyYhV6OXAo7oc9MF7axlg1lzfkCLEtVL')->json();
        $activeCatigories = MainCatigorie::where('translation_lang', CurrentLang())
            ->where('active', 1)
            ->get();
        return view('admin.vendors.addVendor', compact('activeCatigories'));
    }
    public function store(VendorRequest $req)
    {
        // return $req;
        // return $req->catigory_id;
        try {
            $file_name  = saveImage($req->logo, 'vendors');
            DB::beginTransaction();
            $vendID =  Vendor::insertGetId([
                'name' => $req->name,
                'active' => $req->active,
                'catigory_id' => $req->catigory_id,
                'phone' => $req->phone,
                'email' => $req->email,
                'logo' => $file_name,
                'address' => $req->address,
                'password' => bcrypt($req->password),
                'lng' =>$req->longitude,
                'lat' => $req->latitude
            ]);
            DB::commit();
            $vendor = Vendor::find($vendID);
            Notification::send($vendor, new notifyVendor($vendor));
            return redirect()->route('admin.vendors.index')->with(['success' => 'تم اضافة المتجر بنجاح']);
        } catch (\Exception $ex) {
            DB::rollback();
            return $ex;
            return redirect()->route('admin.vendors.index')->with(['error' => 'حدث خطأ في الاضافة']);
        }
        // return $req;
    }
    public function  edit($vendorID)
    {
        $vendor = Vendor::find($vendorID);
        if (!$vendor)
            return redirect()->route('admin.vendors.index')->with(['error' => 'هذا المتجر غير موجود']);

        $activeCatigories = MainCatigorie::where('translation_lang', CurrentLang())
            ->where('active', 1)
            ->get();

            // return $vendor;

        return view('admin.vendors.editVendor', compact('vendor', 'activeCatigories'));
    }
    public function update(Request $request, $vendorID)
    {
        if (!$request->has('active')) {
            $request->request->add(['active' => 0]);
        } else {
            $request->active = 1;
        }
        try {
            DB::beginTransaction();
            $pass = "";
            if ($request->password == "") {
                $pass = Vendor::find($vendorID);
                $pass = $pass -> password;
            } else {
                $pass = bcrypt($request->password);
            }
            $file_name = "";
            if ($request->has('logo')) {
                $file_name  = saveImage($request->logo, 'vendors');
                Vendor::where('id', $vendorID)
                    ->update([
                        'name' => $request->name,
                        'catigory_id' => $request->catigory_id,
                        'phone' => $request->phone,
                        'email' => $request->email,
                        'active' => $request->active,
                        'address' => $request->address,
                        'logo' => $file_name,
                        'password' => $pass
                    ]);
            } else {
                Vendor::where('id', $vendorID)
                    ->update([
                        'name' => $request->name,
                        'catigory_id' => $request->catigory_id,
                        'phone' => $request->phone,
                        'email' => $request->email,
                        'active' => $request->active,
                        'address' => $request->address,
                        'password' => $pass
                    ]);
            }
            DB::commit();
            return redirect()->route('admin.vendors.index')->with(['success' => 'تم تحديث المتجر بنجاح']);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.vendors.index')->with(['error' => 'حدث خطأ اثناء التحديث']);
        }
    }
    public function delete($vendorID)
    {
        $vendor = Vendor::find($vendorID);
        if (!$vendor) {
            return redirect()->route('admin.vendors.index')->with(['error' => 'هذا المتجر غير موجود']);
        }

        try {
            DB::beginTransaction();
            // return 'assets/'.$vendor->logo;
            unlink('assets/'.$vendor->logo);
            $vendor->delete();
            DB::commit();
            return redirect()->route('admin.vendors.index')->with(['success' => 'تم حذف المتجر بنجاح']);
        } catch (\Exception $ex) {
            return $ex;
            DB::rollback();
            return redirect()->route('admin.vendors.index')->with(['error' => 'عفوا حدث خطأ ما الرجاء المحاولة لاحقا']);
        }
    }

    public function status($vendorID){
        $vendor = Vendor::find($vendorID);
        if (!$vendor){
            return redirect()->route('admin.vendors.index')->with(['error' => 'هذا المتجر غير موجود']);
        }
        try{
            DB::beginTransaction();
            $vendor->update(['active' => !$vendor->active]);
            DB::commit();
            return redirect()->route('admin.vendors.index')->with(['success' => 'تم تحديث المتجر بنجاح']);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('admin.vendors.index')->with(['error' => 'عفوا حدث خطأ ما الرجاء المحاولة لاحقا']);
        }

    }

    public function login()
    {
        return view('vendors.auth.login');
    }
    public function checkLogin(Request $request)
    {
        // return $request;
        if (Auth::guard('vendor')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {

            return 'ok';
            // return redirect()->route('////');
        } else {
            return 'no';
            // return redirect()->route('/////')->with(['error' => 'Wrong Data Try Again!']);
        }
    }
    public function eslam()
    {
        return 'Welcome ' . Auth::User()->name;
    }

    function testMap()
    {
       return 'ddd';
    }
}
