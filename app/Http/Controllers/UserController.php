<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function User()
    {
        $data['User']= User::get();
        return view('admin.User.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.User.create');
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
           'name'=> 'required|max:255',
           'email' => 'required|unique:users',
           'password'=>'required|min:5|max:255',
           'admin'=>'required',

       ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
    //    dd($validatedData);
        User::create($validatedData);
        return redirect('/admin/User')->with('pesan','Data berhasil Di Tambahkan !'); 
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
        $data['User']= User::find($id);
        return view('admin.User.edit',$data);
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
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,' . $id, // Menambahkan ID untuk diabaikan saat memeriksa keunikan
            'admin' => 'required',
        ]);
    
        // Hash password sebelum disimpan ke dalam database
    
        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);
    
        // Perbarui data pengguna dengan data yang telah divalidasi
        $user->update($validatedData);
    
        // Redirect ke halaman yang sesuai dan sertakan pesan sukses
        return redirect('/admin/User')->with('pesan', 'Data berhasil diupdate!');
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User=User::find($id)->delete();
        return redirect ('admin/User');
    }
}
