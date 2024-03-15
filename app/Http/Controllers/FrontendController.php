<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesan;
use App\Models\daftar_kurir;
use App\Models\barang;
use App\Models\user;

class FrontendController extends Controller
{
    public function index()
    {
        $jumlah_kurir = daftar_kurir::where('status',1)->count();
        $jumlah_user = user::count();

        return view('frontend.index',compact('jumlah_kurir','jumlah_user'));
    }
    public function ketentuan_barang(){
        return view('frontend.ketentuan');
    }
    public function pengiriman(){
        return view('frontend.pengiriman');
    }
    public function waktu(){
        return view('frontend.waktu');
    }
    public function persyaratan(){
        return view('frontend.persyaratan');
    }
    public function profile()
    {
        $data = Pemesan::where('user_id',auth()->user()->id)->first();
        return view('frontend.profile',compact('data'));
    }
    public function profile_create(Request $request)
    {
        $validatedData = $request->validate([
            'user_id'=> '',           
            'nama' => 'required',
            'kecamatan'=>'required',
            'desa' => 'required',
            'detail_rumah' => 'required',
            'no_hp' => 'required'
        ]) ;
 
         $validatedData['user_id'] = auth()->user()->id;
 
         $pemesan = Pemesan::where('user_id', $validatedData['user_id'])->first();

        if ($pemesan) {
            $pemesan->update($validatedData);
        } else {
            Pemesan::create($validatedData);
        }
         return redirect('/profile')->with('message','Berhasil Di Tambahkan');
     
    }
    public function kirim_barang()
    {
        $alamat = Pemesan::where('user_id',auth()->user()->id)->latest()->first();
        $kurir = daftar_kurir::where('status',1)->inRandomOrder()->get();

        return view('frontend.kirim_barang',compact('alamat','kurir'));
    }
    public function kirim_barang_create(Request $request)
    {
        $validatedData = $request->validate([
            'user_id'=> '',           
            'kurir_id' => 'required',
            'nama_tujuan' => 'required',
            'berat' => 'required',
            'kecamatan'=>'required',
            'desa' => 'required',
            'detail_rumah' => 'required',
            'tarif' => 'required'
        ]) ;
 
         $validatedData['user_id'] = auth()->user()->id;
 
            Barang::create($validatedData);

            return redirect('/riwayat_kirim')->with('message','Berhasil Di Tambahkan');
    }
    public function daftar_kurir()
    {
        $alamat = daftar_kurir::where('user_id',auth()->user()->id)->latest()->first();
        $kurir = daftar_kurir::where('status',1)->inRandomOrder()->get();

        return view('frontend.daftar_kurir',compact('alamat','kurir'));
    }
    public function daftar_kurir_create(Request $request)
    {
        $validatedData = $request->validate([
            'user_id'=> '',           
            'nama' => 'required',
            'no_hp'=>'required',
            'alamat' => 'required',
            'foto' => 'required',
            'nama_motor' => 'required',
            'plat_nomor' => 'required',
            'status' => ''
        ]) ;
 
         $validatedData['user_id'] = auth()->user()->id;
         $validatedData['status'] = 0;
         $validatedData['foto'] = $request->file('foto')->store('img-foto-kurir');
 
            daftar_kurir::create($validatedData);
        
         return redirect('/')->with('message','Berhasil Di Tambahkan');
     
    }
    public function edit_profil_kurir()
    {
        $data['daftar_kurir'] = daftar_kurir::where('user_id', auth()->user()->id)->first();
        return view('frontend.edit_profil_kurir',$data);
    }
    public function update_profil_kurir(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_hp'=>'required',
            'alamat' => 'required',
            'foto' => '',
            'nama_motor' => 'required',
            'plat_nomor' => 'required',
        ]) ;
        if ($request->hasFile('foto')) {
        $validatedData['foto'] = $request->file('foto')->store('img-foto-kurir');
        };
        daftar_kurir::where('user_id', auth()->user()->id)->first()->update($validatedData);

        return redirect('edit_profil_kurir')->with('message','Berhasil Di Update');
    }
    public function daftar_pesanan_kurir()
    {
        $daftar_kurir_id =  auth()->user()->id;
        $data = Barang::select('barang.*')
        ->join('daftar_kurir', 'barang.kurir_id', '=', 'daftar_kurir.id')
        ->where('daftar_kurir.user_id', $daftar_kurir_id)
        ->get();

            
        return view('frontend.daftar_pesanan_kurir',compact('data'));
    }
    public function daftar_pesanan_kurir_edit($id)
    {
        $data = barang::find($id);
        return response()->json($data);
    }
    public function daftar_pesanan_kurir_update(Request $request, $id)
    {
        $data = barang::with('pemesan')->find($id);
        $data->status = $request->status;    
        $data->save();
        return response()->json(['message' => 'Data updated successfully']);

    }
    public function riwayat_kirim()
    {
        $data = barang::where('user_id',auth()->user()->id)->get();
        return view('frontend.riwayat_kirim',compact('data'));
    }
    public function riwayat_kirim_detail($id)
    {
        $data = barang::find($id);
        return response()->json($data);

    }
    public function cetak($id)
    {
        $data = barang::find($id);
        return view('frontend.riwayat_kirim_cetak',compact('data'));
    }
}
