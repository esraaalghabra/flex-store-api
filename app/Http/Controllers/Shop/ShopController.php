<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Vendor;

class ShopController extends Controller
{
    public function index(){
         $mainCategories=MainCategory::with([
             'subCategories'=>function($q){
                return $q->selectU();
         },
             'vendors'=>function($q){
                return $q->selectU();
         },
             'products'=>function($q){
                return $q->selectU();
        }])->selectU()->get();
        return view('front.home',compact('mainCategories'));
    }

    public function indexMainCategory($id){
        $mainCategory=MainCategory::with([
            'subCategories'=>function($q){
                return $q->selectU();
            },
            'vendors'=>function($q){
                return $q->selectU();
            },
            'products'=>function($q){
                return $q->selectU();
            }])->selectU()->find($id);
        return view('front.main_categories.index',compact('mainCategory'));
    }

    public function indexSubCategory($id){
        $subCategory=SubCategory::with([
            'mainCategory'=>function($q){
                return $q->selectU();
            },
            'vendors'=>function($q){
                return $q->selectU();
            },
            'products'=>function($q){
                return $q->selectU();
            }])->selectU()->find($id);
        return view('front.sub_categories.index',compact('subCategory'));
    }

    public function indexVendor($id){
        $vendor=Vendor::with([
            'mainCategory'=>function($q){
                return $q->selectU();
            },'subCategory'=>function($q){
                return $q->selectU();
            },'products'=>function($q){
                return $q->selectU();
            }])->selectU()->find($id);
        return view('front.vendors.index',compact('vendor'));
    }

    public function indexProduct($id){
        $product=Product::selectU()->find($id);
        return view('front.products.index',compact('product'));
    }






    public function getLogin(){
        return view('front.auth.login');
    }

    public function login(LoginRequest $request){
        $remember_me = $request->has('remember_me');
        if(auth()->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me))
            return redirect() -> route('shop.home');
        return redirect()->back()->with(['error' => 'the information doesnt  correct !!' ]);
    }


}
