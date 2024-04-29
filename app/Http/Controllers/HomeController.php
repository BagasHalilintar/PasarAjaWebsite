<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Informasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $dataInformasi = Informasi::get();
        $dataEvent = Event::get();
        return view('home',compact('dataInformasi', 'dataEvent'));
    }

   
}