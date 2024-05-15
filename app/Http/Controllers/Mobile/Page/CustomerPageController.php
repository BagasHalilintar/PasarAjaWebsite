<?php

namespace App\Http\Controllers\Mobile\Page;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Category\CategoryController;
use App\Http\Controllers\Mobile\Product\ProductController;
use App\Http\Controllers\Mobile\Product\UserProductController;
use App\Http\Controllers\Website\ShopController;
use App\Models\ProductCategories;
use App\Models\Shops;
use Illuminate\Http\Request;

class CustomerPageController extends Controller
{
    public function beranda(ShopController $shops, Shops $shopModel, UserProductController $userCont){
        $responseShop = $shops->listOfShop($shopModel);
        if ($responseShop->getStatusCode() === 200) {
            $shopData = $responseShop->getData()->data;
        } else {
            return response()->json(['status' => 'error', 'message' => 'Toko tidak ditemukan'], 404);
        }

        $responseProd = $userCont->getAllProducts();
        if ($responseProd->getStatusCode() === 200) {
            $prodData = $responseProd->getData()->data;
        } else {
            return response()->json(['status' => 'error', 'message' => 'Toko tidak ditemukan'], 404);
        }


        $datas = [
            'shops' => $shopData,
            'products' => $prodData,
        ];

        return response()->json(['status' => 'success', 'data'=> $datas]);
    }

    public function shopDetail(Request $request, ShopController $shops, Shops $shopModel, ProductController $prodCont){
        $idShop = $request->input('id_shop');

        $responseShop = $shops->getShopData($request, $shopModel);
        if ($responseShop->getStatusCode() === 200) {
            $shopData = $responseShop->getData()->data;
        } else {
            return response()->json(['status' => 'error', 'message' => 'Toko tidak ditemukan'], 404);
        }

        $responseProd = $prodCont->allProducts($request);
        if ($responseProd->getStatusCode() === 200) {
            $prodData = $responseProd->getData()->data;
        } else {
            return response()->json(['status' => 'error', 'message' => 'Toko tidak ditemukan'], 404);
        }

        $data = [
            'shop_data' => $shopData,
            'products' => $prodData,
        ];

        return response()->json(['status' => 'success', 'data' => $data], 200);
    }

    public function promo(UserProductController $userCont, ProductCategories $categories, CategoryController $ctgCont){
        $responseProd = $userCont->getAllProducts();
        if ($responseProd->getStatusCode() === 200) {
            $prodData = $responseProd->getData()->data;
        } else {
            return response()->json(['status' => 'error', 'message' => 'Toko tidak ditemukan'], 404);
        }

        $responseCtg = $ctgCont->allCategories($categories);
        if ($responseCtg->getStatusCode() === 200) {
            $ctgData = $responseCtg->getData()->data;
        } else {
            return response()->json(['status' => 'error', 'message' => 'Toko tidak ditemukan'], 404);
        }

        $data = [
            'categories' => $ctgData,
            'products' => $prodData,
        ];

        return response()->json(['status'=>'success', 'message'=>'data get', 'data'=> $data], 200);
    }
}
