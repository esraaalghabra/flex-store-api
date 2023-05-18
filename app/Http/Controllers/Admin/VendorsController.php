<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Models\MainCategory;
use App\Models\SubCategory;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VendorsController extends Controller
{
    public function index(){
        $vendors = Vendor::with('products')->selection()->paginate(PAGINATION_COUNT);
        return view('admin.vendors.index', compact('vendors'));
    }

    public function create(){
        $mainCategories = MainCategory::selection()->active()->get();
        $subCategories = SubCategory::active()->get();
        return view('admin.vendors.create', compact('mainCategories','subCategories'));
    }

    public function store(VendorRequest $request){
        try {
            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            $filePath = uploadImage('vendors', $request->photo);
            $filePathFirst = uploadImage('vendors', $request->photo_first);
            $filePathSecond = uploadImage('vendors', $request->photo_second);

            Vendor::create([
                'name' => $request->name,
                'details' => $request->details,
                'address' => $request->address,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'password' => $request->password,
                'active' => $request->active,
                'main_category_id' => $request->main_category_id,
                'sub_category_id' => $request->sub_category_id,
                'photo' => $filePath,
                'photo_first' => $filePathFirst,
                'photo_second' => $filePathSecond,
            ]);
            return redirect()->route('admin.vendors')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function edit($vendor_id){
        try {
            $vendor = Vendor::selection()->find($vendor_id);
            if (!$vendor)
                return redirect()->route('admin.vendors')->with(['error' => 'هذا المتجر غير موجود او ربما يكون محذوفا ']);
            $mainCategories = MainCategory::selection()->get();
            $subCategories = SubCategory::selection()->get();
            return view('admin.vendors.edit', compact('vendor', 'mainCategories','subCategories'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function update($vendor_id, VendorRequest $request){
        try {
            $vendor = Vendor::selection()->find($vendor_id);
            if (!$vendor)
                return redirect()->route('admin.vendors')->with(['error' => 'هذا المتجر غير موجود او ربما يكون محذوفا ']);
            if($request->has('active') && ($vendor->subCategory->active==0 || $vendor->mainCategory->active==0))
                return redirect()->route('admin.vendors')->with(['error' => ' لا بمكن تغير حالة المتجر ']);

            DB::beginTransaction();
            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);
            $vendor->update(['active' => $request->active]);

            if ($request->has('photo')) {
                $filePath = uploadImage('vendors', $request->photo);
                Vendor::where('id',$vendor_id)->update(['photo' => $filePath,]);
            }
            if ($request->has('photo_first')) {
                $filePathFirst = uploadImage('vendors', $request->photo_first);
                Vendor::where('id',$vendor_id)->update(['photo_first' => $filePathFirst,]);
            }
            if ($request->has('photo_second')) {
                $filePathSecond = uploadImage('vendors', $request->photo_second);
                Vendor::where('id',$vendor_id)->update(['photo_second' => $filePathSecond,]);
            }

            Vendor::where('id', $vendor_id)->update([
                'name' => $request->name,
                'address' => $request->address,
                'details' => $request->details,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'password' => $request->password,
                'main_category_id' => $request->main_category_id,
                'sub_category_id' => $request->sub_category_id,
            ]);
            DB::commit();
            return redirect()->route('admin.vendors')->with(['success' => 'تم التحديث بنجاح']);
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function destroy($vendor_id){
        try {
            $vendor = Vendor::find($vendor_id);
            if(!$vendor)
                return redirect()->route('admin.vendors')->with(['error' => 'هذا المتجر غير موجود ']);

            $products = $vendor->products();
            if (isset($products) && $products->count() > 0)
                return redirect()->route('admin.vendors')->with(['error' => 'لأ يمكن حذف هذا القسم  ']);

            $image = Str::after($vendor->photo, 'assets/');
            $image = public_path('assets/' . $image);
            unlink($image);
            $image = Str::after($vendor->photo_first, 'assets/');
            $image = public_path('assets/' . $image);
            unlink($image);
            $image = Str::after($vendor->photo_second, 'assets/');
            $image = public_path('assets/' . $image);
            unlink($image);

            $vendor->delete();
            return redirect()->route('admin.vendors')->with(['success' => 'تم حذف المتجر بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function changeStatus($vendor_id){
        try{
            $vendor = Vendor::find($vendor_id);
            if (!$vendor)
                return redirect()->route('admin.vendors')->with(['error' => 'هذا المتجر غير موجود ']);
            if ($vendor->mainCategory->active==0 || $vendor->subCategory->active==0)
                return redirect()->route('admin.vendors')->with(['error' => ' لا بمكن تغير حالة المتجر ']);

            $status =  $vendor -> active  == 0 ? 1 : 0;
            $vendor -> update(['active' =>$status ]);
            return redirect()->route('admin.vendors')->with(['success' => ' تم تغيير الحالة بنجاح ']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function showProducts($vendor_id){
        $vendor=Vendor::with("products")->find($vendor_id);
        if(!$vendor)
            return redirect()->route('admin.vendors')->with(['error' => 'هذا المتجر غير موجود ']);
        return view('admin.vendors.show_products',compact('vendor'));
    }
}
