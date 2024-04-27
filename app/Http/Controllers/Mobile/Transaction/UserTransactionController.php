<?php

namespace App\Http\Controllers\Mobile\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Shops;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserTransactionController extends Controller
{

    public function listOfTrxNew(Request $request)
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
}
