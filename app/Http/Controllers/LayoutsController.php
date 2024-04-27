<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Website\ShopController;
use App\Models\Shops;
use Illuminate\Http\Request;

class LayoutsController extends Controller
{
    public function index(){
        return view('layouts.index');
    }

    public function event(){
        return view('layouts.event');
    }

    public function tambah(ShopController $shopController, Shops $shops){
        $listShop = $shopController->listOfShop($shops)->getData()->data;
        return view('layouts.tambah', ['data' => $listShop]);
    }

    public function promo(){
        return view('layouts.promo');
    }

    public function informasi(){
        return view('layouts.informasi');
    }
} 
