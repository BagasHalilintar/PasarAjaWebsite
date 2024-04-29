<?php

namespace  App\Http\Controllers;
use App\Models\Informasi;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class 
UploadController extends Controller{
    public function index() {

        $inputInformasi = Informasi::get();
        return view('layouts.informasi',['inputInformasi' => $inputInformasi]);
    }
    public function input_informasi(Request $request)
    {
        // Validasi input
        $validasi = Validator::make($request->all(), [
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000',
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

        return redirect('/layouts/informasi')->with('success', 'Data informasi berhasil disimpan');

    }
    public function destroy($id_informasi)
    {
        $informasi = Informasi::findOrFail($id_informasi);
        $informasi->delete();

        return redirect()->back()->with('success', 'Paket berhasil dihapus');
    }
}