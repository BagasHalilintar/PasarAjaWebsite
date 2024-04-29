<?php

namespace  App\Http\Controllers;
use App\Models\Event;
use App\Models\Informasi;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UploadEventController extends Controller{
    public function index() {

        $inputEvent = Event::select('id', 'judul', 'deskripsi', 'foto')->get();
        return view('layouts.event',['inputEvent' => $inputEvent]);
    }
    public function input_event(Request $request)
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
        $dataEvent = $request->only(['judul', 'deskripsi']);
        
        // Upload dan simpan foto
        $foto = $request->file('foto');
        $nama_foto = time() . "_" . $foto->getClientOriginalName();
        $tujuan_upload = 'data_event'; // Ubah sesuai dengan folder tujuan Anda
        $foto->move($tujuan_upload, $nama_foto);
        $dataEvent['foto'] = $nama_foto;

        Event::create($dataEvent);

        return redirect('/layouts/event')->with('success', 'Data event berhasil disimpan');

    }
    public function destroy($id_event)
    {
        $event = Event::findOrFail($id_event);
        $event->delete();

        return redirect()->back()->with('success', 'Event berhasil dihapus');
    }

    
}