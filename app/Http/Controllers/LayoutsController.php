<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Informasi;
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

    public function tambah(){
        return view('layouts.tambah');
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

