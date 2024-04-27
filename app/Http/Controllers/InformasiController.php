<?php

namespace App\Http\Controllers;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InformasiController extends Controller
{
    public function show(){
        $dataInformasi = Informasi::get();
        $inputInformasi = Informasi::get();
        return view('layouts.informasi',compact('dataInformasi'), ['inputInformasi' => $inputInformasi]);
    }

    public function input_paket(Request $request)
    {
        // Validasi input
        $validasi = Validator::make($request->all(), [
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->back()->withInput()->withErrors($validasi);
        }

        // Simpan data paket ke dalam database
        $datainformasi = $request->only(['judul', 'deskripsi']);
        
        // Upload dan simpan foto
        $foto = $request->file('foto');
        $nama_foto = time() . "_" . $foto->getClientOriginalName();
        $tujuan_upload = 'data_informasi'; // Ubah sesuai dengan folder tujuan Anda
        $foto->move($tujuan_upload, $nama_foto);
        $datainformasi['foto'] = $nama_foto;

        Informasi::create($datainformasi);

        return response()->json(['success' => true]);
    }
}
