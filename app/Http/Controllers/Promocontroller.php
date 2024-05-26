<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Website\ShopController;
use App\Models\Shops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Promocontroller extends Controller
{
    public function getPromos()
    {
        $allPromos = [];

        $allShop = DB::table('0shops')->select('id_shop')->get();

        foreach ($allShop as $shop) {
            $idShop = $shop->id_shop;
            $tableProd = 'sp_' . $idShop . '_prod';
            $tablePromo = 'sp_' . $idShop . '_promo';

            // Ambil tanggal saat ini
            $currentDate = Carbon::now()->toDateString();

            $promos = DB::table(DB::raw("$tablePromo as prm"))
                ->join(DB::raw("$tableProd as prod"), "prod.id_product", "prm.id_product")
                ->join('0product_categories as ctg', 'ctg.id_cp_prod', 'prod.id_cp_prod')
                ->select("prm.*", "prod.id_shop", "prod.product_name", "prod.id_cp_prod", "ctg.category_name", "prod.price", "prod.photo")
                ->where('prm.start_date', '<=', $currentDate)
                ->where('prm.end_date', '>=', $currentDate)
                ->orderByDesc('prm.end_date')
                ->get();

            // cek apakah $promos atau tidak
            if (!$promos->isEmpty()) {
                // add photo path
                foreach ($promos as $prm) {
                    $prm->product_name = ucwords($prm->product_name);
                    $prm->photo = asset('prods/' . $prm->photo);
                }
            }

            // tambahkan $promo ke $allPromos
            $allPromos = array_merge($allPromos, $promos->toArray());
        }

        return response()->json(['status' => 'success', 'message' => 'Data didapatkan', 'data' => $allPromos], 200);
    }
    public function promo(ShopController $shopController, Shops $shops)
    {
        // $listPromo = $shopController->listOfShop($shops)->getData()->data;
        $listPromo = $this->getPromos();
        return view('layouts.promo', ['data' => $listPromo->getData()->data]);
    }
}
