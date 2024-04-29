<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateInformasiController extends Controller
{
    public function update_informasi(Request $request)
{
    // Validasi input
    $validasi = Validator::make($request->all(), [
        'judul' => 'required|string',
        'deskripsi' => 'required|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
    ]);

    // Jika validasi gagal
    if ($validasi->fails()) {
        return redirect()->back()->withInput()->withErrors($validasi);
    }

    // Dapatkan ID acara
    $informasi_id = $request->input('informasi_id');

    // Dapatkan data acara yang ingin dikemaskini
    $informasi = Informasi::findOrFail($informasi_id);

    // Simpan data kemaskini ke dalam database
    $informasi->judul = $request->input('judul');
    $informasi->deskripsi = $request->input('deskripsi');

    // Semak adakah gambar baru dihantar
    if ($request->hasFile('foto')) {
        // Upload dan simpan foto baru
        $foto = $request->file('foto');
        $nama_foto = time() . "_" . $foto->getClientOriginalName();
        $tujuan_upload = 'data_informasi'; // Ubah sesuai dengan folder tujuan Anda
        $foto->move($tujuan_upload, $nama_foto);
        // Hapus gambar lama sebelum menyimpan gambar baru
        if ($informasi->foto) {
            unlink($tujuan_upload . '/' . $informasi->foto);
        }
        $informasi->foto = $nama_foto;
    }

    // Simpan perubahan acara ke dalam database
    $informasi->save();

    return redirect('/layouts/informasi')->with('success', 'Data informasi berhasil dikemaskini');
}

}
