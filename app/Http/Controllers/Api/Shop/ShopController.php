<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Vendor;

class ShopController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $mainCategories= MainCategory::with([
            'subCategories'=>function($q){
                return $q->selectU();
            },
            'vendors'=>function($q){
                return $q->selectU();
            },
            'products'=>function($q){
                return $q->selectU();
            }])->selectU()->get();

        return $this->apiResponse($mainCategories, 'success', 200);
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
        return $this->apiResponse($mainCategory, 'success', 200);
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
        return $this->apiResponse($subCategory, 'success', 200);
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
        return $this->apiResponse($vendor, 'success', 200);
    }

    public function indexProduct($id){
        $product=Product::selectU()->find($id);
        return $this->apiResponse($product, 'success', 200);
    }

}
