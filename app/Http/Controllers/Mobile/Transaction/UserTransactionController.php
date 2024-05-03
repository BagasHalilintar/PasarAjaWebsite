<?php

namespace App\Http\Controllers\Mobile\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Product\ProductController;
use App\Http\Controllers\Mobile\Product\ProductReviewController;
use App\Http\Controllers\Website\ShopController;
use App\Models\Shops;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserTransactionController extends Controller
{

    public function dataTrx(Request $request)
    {
        try {
            $email = $request->input('email');
            $orderCode = $request->input('order_code');

            // Mendapatkan ID pengguna
            $idUser = User::where('email', $email)->value('id_user');

            // generate collection name
            $collectionName = 'us_' . $idUser . '_trx';

            // Menginisialisasi Firestore
            $firestore = app('firebase.firestore');
            $collectionRef = $firestore->database()->collection($collectionName);

            // Mendapatkan data transaksi dengan kondisi tertentu
            $documents = $collectionRef
                ->where('order_code', '==', $orderCode)
                ->limit(1)
                ->documents();

            if ($documents->isEmpty()) {
                return response()->json(['status' => 'error', 'message' => 'Transaksi Tidak Ditemukan'], 404);
            }

            $data = [];

            // Membaca semua data transaksi
            foreach ($documents as $document) {
                $docData = $document->data();
                $docId = $document->id();
                $docData['id'] = $docId;
                $data[] = $docData;
            }

            // mengupdate nama toko
            foreach ($data as &$d) {
                $idShop = $d['shop_data']['id_shop'];
                // Mendapatkan nama toko
                $shopName = Shops::where('id_shop', $idShop)->value('shop_name');
                if ($shopName) {
                    $d['shop_data']['shop_name'] = $shopName;
                }

                // update data product
                foreach ($d['details'] as &$detail) {
                    $prodTable = 'sp_' . $idShop . '_prod';
                    $prodData = DB::table($prodTable)
                        ->select('product_name', 'photo')
                        ->where('id_shop', $idShop)
                        ->first();

                    $detail['product_name'] = ucwords($prodData->product_name);
                    $detail['product_photo'] = asset('prods/' . $prodData->photo);
                }
            }

            return response()->json(['status' => 'success', 'message' => 'Data berhasil didapatkan', 'data' => $data[0]], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Gagal mendapatkan data: ' . $e->getMessage()], 400);
        }
    }

    public function listOfTrx(Request $request)
    {
        try {
            $email = $request->input('email');
            $type = $request->input('type');

            // Mendapatkan ID pengguna
            $idUser = User::where('email', $email)->value('id_user');

            // generate collection name
            $collectionName = 'us_' . $idUser . '_trx';

            // Menginisialisasi Firestore
            $firestore = app('firebase.firestore');
            $collectionRef = $firestore->database()->collection($collectionName);

            // Mendapatkan data transaksi dengan kondisi tertentu
            $documents = $collectionRef
                ->where('status', '==', $type)
                ->documents();

            $data = [];

            // Membaca semua data transaksi
            foreach ($documents as $document) {
                $docData = $document->data();
                $docId = $document->id();
                $docData['id'] = $docId;
                $data[] = $docData;
            }

            // Fungsi untuk melakukan pengurutan array berdasarkan nilai 'created_at'
            usort($data, function ($a, $b) {
                return strtotime($b['created_at']) - strtotime($a['created_at']);
            });

            // mengupdate nama toko
            foreach ($data as &$d) {
                $idShop = $d['shop_data']['id_shop'];
                // Mendapatkan nama toko
                $shopName = Shops::where('id_shop', $idShop)->value('shop_name');
                if ($shopName) {
                    $d['shop_data']['shop_name'] = $shopName;
                }

                // update data product
                foreach ($d['details'] as &$detail) {
                    $prodTable = 'sp_' . $idShop . '_prod';
                    $prodData = DB::table($prodTable)
                        ->select('product_name', 'photo')
                        ->where('id_shop', $idShop)
                        ->first();

                    $detail['product_name'] = ucwords($prodData->product_name);
                    $detail['product_photo'] = asset('prods/' . $prodData->photo);
                }
            }

            return response()->json(['status' => 'success', 'message' => 'Data berhasil didapatkan', 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Gagal mendapatkan data: ' . $e->getMessage()], 400);
        }
    }

    public function detailProduct(Request $request, ShopController $shops,  ProductController $products, ProductReviewController $reviews)
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

    public function getAllCart(Request $request, Shops $shops)
    {
        try {
            $idUser = $request->input('id_user');

            $collectionName = 'us_' . $idUser . '_cart';

            // inisialisasi collection
            $firestore = app('firebase.firestore');
            $collectionRef = $firestore->database()->collection($collectionName);

            // mendapatkan semua data dalam collection
            $documents = $collectionRef->documents();

            $data = [];

            // membaca semua data dalam dokumen
            foreach ($documents as $document) {

                // mendapatkan data dari dokumen
                $docData = $document->data();

                // get shop data
                $shopData = $shops
                ->select()
                ->where('id_shop', $docData['id_shop'])
                ->first();
                $docData['shop_data'] = $shopData;

                // save data
                $data[] = $docData;
            }

            return response()->json(['status' => 'success', 'message' => 'Data berhasil didapatkan', 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Gagal mendapatkan data: ' . $e->getMessage()], 500);
        }
    }

    public function addToCartOld(Request $request, ShopController $shops)
    {
        try {
            $idUser = $request->input('id_user');
            $idShop = $request->input('id_shop');
            $idProduct = $request->input('id_product');
            $promoPrice = $request->input('promo_price');
            $quantity = $request->input('quantity');
            $notes = $request->input('notes');

            $collectionName = 'us_' . $idUser . '_cart';

            // Get shop data
            $responseShop = $shops->getShopData($request, new Shops());
            if ($responseShop->getStatusCode() === 200) {
                $shopData = $responseShop->getData()->data;
            } else {
                return response()->json(['status' => 'error', 'message' => 'Toko tidak ditemukan'], 404);
            }

            $data = [
                "id_shop" => $idShop,
                "products" => [
                    [
                        "id_product" => 3,
                        "quantity" => 2,
                        "promo_price" => 2000,
                        "notes" => 'awokwokw',
                    ],
                    [
                        "id_product" => $idProduct,
                        "quantity" => $quantity,
                        "promo_price" => $promoPrice,
                        "notes" => $notes,
                    ]
                ]
            ];

            // menambahkan data ke collection
            $firestore = app('firebase.firestore')
                ->database()
                ->collection($collectionName)
                ->newDocument();
            $firestore->set($data);

            return response()->json(['status' => 'success', 'message' => 'Keranjang berhasil ditambahkan'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function addToCart(Request $request, ShopController $shops)
    {
        try {
            $idUser = $request->input('id_user');
            $idShop = $request->input('id_shop');
            $idProduct = $request->input('id_product');
            $promoPrice = $request->input('promo_price');
            $quantity = $request->input('quantity');
            $notes = $request->input('notes');
            $productData = $request->input('product_data');

            $collectionName = 'us_' . $idUser . '_cart';

            // Get shop data
            $responseShop = $shops->getShopData($request, new Shops());
            if ($responseShop->getStatusCode() === 200) {
                $shopData = $responseShop->getData()->data;
            } else {
                return response()->json(['status' => 'error', 'message' => 'Toko tidak ditemukan'], 404);
            }

            // Inisialisasi collection
            $firestore = app('firebase.firestore');
            $collectionRef = $firestore->database()->collection($collectionName);

            // Mendapatkan dokumen dengan idshop tertentu
            $query = $collectionRef
                ->where('id_shop', '=', $idShop)
                ->limit(1)
                ->documents();

            // Array untuk menyimpan data produk
            $products = [];

            foreach ($query as $document) {
                $documentData = $document->data();
                $documentProducts = $documentData['products'];
                foreach ($documentProducts as $key => $product) {
                    $products[] = $product;
                    if ($product['id_product'] == $idProduct) {
                        // Hapus elemen dari array
                        unset($products[$key]);
                    }
                }
            }

            $newProduct =  [
                "id_product" => $idProduct,
                "quantity" => $quantity,
                "promo_price" => $promoPrice,
                "notes" => $notes,
                "product_data" => $productData
            ];

            // tambahkan $newProduct ke $products
            array_push($products, $newProduct);

            // memastikan tidak ada id product yang double
            $existingIds = [];
            $uniqueProducts = [];
            foreach ($products as $prod) {
                // Periksa apakah ID produk sudah ada dalam larik
                if (isset($existingIds[$prod['id_product']])) {
                    // Jika ya, skip produk ini (duplikat)
                    continue;
                } else {
                    // Jika tidak, tambahkan ID produk ke larik dan tambahkan produk ke larik sementara
                    $existingIds[$prod['id_product']] = true;
                    $uniqueProducts[] = $prod;
                }
            }
            $products = $uniqueProducts;


            // hapus collection dengan field id_shop = $idShop
            $query = $collectionRef
                ->where('id_shop', '=', $idShop)
                ->documents();

            foreach ($query as $document) {
                $document->reference()->delete();
            }

            // tambahkan $products ke collection
            $collectionRef->add([
                'id_shop' => $idShop,
                'products' => $products
            ]);

            return response()->json(['status' => 'success', 'message' => 'Keranjang berhasil ditambahkan', 'data' => $products], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function removeCart(Request $request, ShopController $shops){
        try {
            $idUser = $request->input('id_user');
            $idShop = $request->input('id_shop');
            $idProduct = $request->input('id_product');

            $collectionName = 'us_' . $idUser . '_cart';

            // Inisialisasi collection
            $firestore = app('firebase.firestore');
            $collectionRef = $firestore->database()->collection($collectionName);

            // Mendapatkan dokumen dengan idshop tertentu
            $query = $collectionRef
                ->where('id_shop', '=', $idShop)
                ->limit(1)
                ->documents();

            // Array untuk menyimpan data produk
            $products = [];

            foreach ($query as $document) {
                $documentData = $document->data();
                $documentProducts = $documentData['products'];
                foreach ($documentProducts as $key => $product) {
                    $products[] = $product;
                    if ($product['id_product'] == $idProduct) {
                        // Hapus elemen dari array
                        unset($products[$key]);
                    }
                }
            }

            // memastikan tidak ada id product yang double
            $existingIds = [];
            $uniqueProducts = [];
            foreach ($products as $prod) {
                // Periksa apakah ID produk sudah ada dalam larik
                if (isset($existingIds[$prod['id_product']])) {
                    // Jika ya, skip produk ini (duplikat)
                    continue;
                } else {
                    // Jika tidak, tambahkan ID produk ke larik dan tambahkan produk ke larik sementara
                    $existingIds[$prod['id_product']] = true;
                    $uniqueProducts[] = $prod;
                }
            }
            $products = $uniqueProducts;


            // hapus collection dengan field id_shop = $idShop
            $query = $collectionRef
                ->where('id_shop', '=', $idShop)
                ->documents();

            foreach ($query as $document) {
                $document->reference()->delete();
            }

            // tambahkan $products ke collection
            $collectionRef->add([
                'id_shop' => $idShop,
                'products' => $products
            ]);

            return response()->json(['status' => 'success', 'message' => 'Produk berhasil dihapus dari keranjang'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
// $data = [
//     "id_shop" => $idShop,
//     "products" => [
//         [
//             "id_product" => $idProduct,
//             "quantity" => $quantity,
//             "promo_price" => $promoPrice,
//             "notes" => $notes,
//         ]
//     ]
// ];


// $products =  [
//     "id_product" => $idProduct,
//     "quantity" => $quantity,
//     "promo_price" => $promoPrice,
//     "notes" => $notes,
// ];
