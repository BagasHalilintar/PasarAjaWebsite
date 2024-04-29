<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateEventController extends Controller
{
    public function update_event(Request $request)
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
    $event_id = $request->input('event_id');

    // Dapatkan data acara yang ingin dikemaskini
    $event = Event::findOrFail($event_id);

    // Simpan data kemaskini ke dalam database
    $event->judul = $request->input('judul');
    $event->deskripsi = $request->input('deskripsi');

    // Semak adakah gambar baru dihantar
    if ($request->hasFile('foto')) {
        // Upload dan simpan foto baru
        $foto = $request->file('foto');
        $nama_foto = time() . "_" . $foto->getClientOriginalName();
        $tujuan_upload = 'data_event'; // Ubah sesuai dengan folder tujuan Anda
        $foto->move($tujuan_upload, $nama_foto);
        // Hapus gambar lama sebelum menyimpan gambar baru
        if ($event->foto) {
            unlink($tujuan_upload . '/' . $event->foto);
        }
        $event->foto = $nama_foto;
    }

    // Simpan perubahan acara ke dalam database
    $event->save();

    return redirect('/layouts/event')->with('success', 'Data event berhasil dikemaskini');
}

}
