<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftar_kurir extends Model
{
    use HasFactory;
    protected $table ='daftar_kurir';
    // protected $primaryKey='id';
    
    // protected $fillable= array('user_id','nama','no_hp','alamat','foto','nama_motor','plat_nomor','status','created_at','update_at');
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
