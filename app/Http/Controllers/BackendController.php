<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\daftar_kurir;
use App\Models\barang;
use Session;
use Carbon\Carbon;
class BackendController extends Controller
{
    public function dashboard(){
        $total_user = User::where('admin',0)->count();
        $total_admin = User::where('admin',1)->count();
        $total_kurir = daftar_kurir::where('status',1)->count();
        $total_semua_pesanan = barang::count();
        $total_pesanan_hari_ini = barang::whereDate('created_at', Carbon::today())->count();


        return view('admin.index',compact('total_user','total_admin','total_kurir','total_semua_pesanan','total_pesanan_hari_ini'));
    }
   
}

