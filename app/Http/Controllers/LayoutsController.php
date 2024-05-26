<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use App\Models\Event;
use App\Models\Informasi;

use App\Http\Controllers\Website\ShopController;
use App\Models\Promo;
use App\Models\Shops;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LayoutsController extends Controller
{
    public function index(){
        $totalinformasi = Informasi::count();
        $totalevent = Event::count();
        $totaltambah = Shops::count(); 
        $totalpromo = Promo::count();
        return view('layouts.index', [
            'totalinformasi' =>  $totalinformasi, 
            'totalevent' =>  $totalevent, 
            'totaltambah' =>  $totaltambah, 
            'totalpromo' =>  $totalpromo,
        ]);
    }

    public function event(){
        $dataEvent = Event::get();
        return view('layouts.event',compact('dataEvent'));
    }

    public function tambah(ShopController $shopController, Shops $shops){
        $listShop = $shopController->listOfShop($shops)->getData()->data;
        return view('layouts.tambah', ['data' => $listShop]);
    }
    public function profil(){
        $admin = Admin::get();
        return view('layouts.profil',compact('admin'));
    }

    public function promo()
    {
        // $listPromo = $shopController->listOfShop($shops)->getData()->data;
        $listPromo = $this->getPromos();
        return view('layouts.promo', ['data' => $listPromo->getData()->data]);
    }

    public function informasi(){
        $dataInformasi = Informasi::get();
        return view('layouts.informasi',compact('dataInformasi'));
    }

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
} 

