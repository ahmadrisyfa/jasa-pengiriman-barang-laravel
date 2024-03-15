<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\daftar_kurir;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\KirimMail;
class DaftarKurirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftar_kurir()
    {
        $data['daftar_kurir']= daftar_kurir::get();
         return view('admin.daftar_kurir.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.daftar_kurir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id'=> '',
            'nama'=> 'required',
            'no_hp'=> 'required',
            'alamat'=> 'required',
            'foto'=> 'required',
            'nama_motor'=> 'required',
            'plat_nomor'=> 'required',
            'status'=> '',
        ]);
 
         $validatedData['user_id'] = auth()->user()->id;
         $validatedData['status'] = 0;
         $validatedData['foto'] = $request->file('foto')->store('img-foto-kurir');

 
         daftar_kurir::create($validatedData);
        return redirect('admin/daftar_kurir');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['daftar_kurir']= daftar_kurir::find($id);
        return view('admin.daftar_kurir.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $daftar_kurir = daftar_kurir::find($id);
        $daftar_kurir->status = $request->status;
        $daftar_kurir->update();

        $user = $daftar_kurir->user;

        // $nama = $user->name;
        // $email = $user->email;

        // Mail::to($user->email)->send(new kirimMail($nama, $email));
        return redirect('admin/daftar_kurir');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {       
        $daftar_kurir = daftar_kurir::find($id);
        if ($daftar_kurir->foto) {
            Storage::delete($daftar_kurir->foto);
        }
        $daftar_kurir->delete();
        return redirect ('admin/daftar_kurir');
    }
}
