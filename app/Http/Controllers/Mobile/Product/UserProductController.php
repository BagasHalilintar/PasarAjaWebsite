<?php

namespace App\Http\Controllers\Mobile\Product;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Category\CategoryController;
use App\Http\Controllers\Website\ShopController;
use App\Models\ProductCategories;
use App\Models\Shops;
use Illuminate\Http\Request;

class UserProductController extends Controller
{

    public function getAllCategories(CategoryController $categoryController, ProductCategories $productCategories)
    {
        // get categories
        $categoryData = $categoryController->allCategories($productCategories)->getData();
        if ($categoryData->status === 'success') {
            $categories = $categoryData->data;
        } else {
            $categories = [];
        }

        return response()->json(['status' => 'success', 'message' => 'Data berhasil didapatkan', 'data' => $categories], 200);
    }

    public function detailProduct(Request $request, ShopController $shops,  ProductController $products, ProductReviewController $reviews, ProductPromoController $promo)
    {
        $request->input('id_shop');
        $request->input('id_product');

        $rvwArray = [];

        // get shop data
        $responseShop = $shops->getShopData($request, new Shops());
        if ($responseShop->getStatusCode() === 200) {
            $shopData = $responseShop->getData()->data;
        } else {
            return response()->json(['status' => 'error', 'message' => 'toko tidak ditemukan'], 404);
        }

        // get prod data
        // echo 'id product : ' . $request->input('id_product');
        $responseProd = $products->dataProduct($request);
        if ($responseProd->getStatusCode() === 200) {
            $prodData = $responseProd->getData()->data;

            // get promo data
            $promoTemp = $promo->getPromo($request)->getData()->data;

            if (!empty($promoTemp)) {
                $promoData = [
                    'promo_price' => $promoTemp->promo_price,
                    'percentage' => $promoTemp->percentage,
                    'start_date' => $promoTemp->start_date,
                    'end_date' => $promoTemp->end_date,
                ];
            } else {
                $promoData = [
                    'promo_price' => null,
                    'percentage' => null,
                    'start_date' => null,
                    'end_date' => null,
                ];
            }

            $prodData->promo = $promoData;
        } else {
            return response()->json(['status' => 'error', 'message' => 'produk tidak ditemukan'], 404);
        }

        // get review data
        $responseRvw = $reviews->getReviews($request);
        if ($responseRvw->getStatusCode() === 200) {
            $rvwData = $responseRvw->getData()->data;
            $rvwArray = (array) $rvwData;
        }

        $data = [
            'shop_data' => $shopData,
            'product' => $prodData,
            'rating' => $rvwArray,
        ];

        return response()->json(['status' => 'success', 'message' => 'data didapatkan', 'data' => $data], 200);
    }


    public function getAllProducts()
    {
        try {

            // Inisialisasi collection
            $firestore = app('firebase.firestore');
            $collectionRef = $firestore->database()->collection("0products");

            // mendapatkan semua data produk
            $query = $collectionRef->where('settings.is_shown', '==', true)
                ->where('settings.is_available', '==', true);

            // Mendapatkan semua data yang sesuai dengan kondisi where
            $documents = $query->documents();

            $data = [];

            // membaca semua data dalam dokumen
            foreach ($documents as $document) {

                // mendapatkan data dari dokumen
                $docData = $document->data();

                // mendapatkan id dokumen
                $docId = $document->id();
                $docData['id'] = $docId;
                $docData['settings'] = json_encode($docData['settings']);

                // save data
                $data[] = $docData;
            }

            // random urutan data pada $data
            shuffle($data);

            return response()->json(['status' => 'success', 'message' => 'Data berhasil didapatkan', 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Gagal mendapatkan data: ' . $e->getMessage()], 500);
        }
    }
}
