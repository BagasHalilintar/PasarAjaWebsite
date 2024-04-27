<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Event;
use App\Models\Informasi;
=======
use App\Http\Controllers\Website\ShopController;
use App\Models\Shops;
>>>>>>> 6ef0091edfb41fad5cee99ead3d838281ad7ce8a
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LayoutsController extends Controller
{
    public function index(){
        $totalinformasi = Informasi::count();
        $totalevent = Event::count();
        return view('layouts.index', [
            'totalinformasi' =>  $totalinformasi, 
            'totalevent' =>  $totalevent, 
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
        return view('layouts.profil');
    }

    public function promo(){
        return view('layouts.promo');
    }

    public function informasi(){
        $dataInformasi = Informasi::get();
        return view('layouts.informasi',compact('dataInformasi'));
    }

    
} 

