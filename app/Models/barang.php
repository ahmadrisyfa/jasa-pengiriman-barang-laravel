<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table ='barang';
    // protected $primaryKey='id';
    
    // protected $fillable= array('user_id','kurir_id','berat','kecamatan','desa','detail_rumah','tarif','created_at','update_at');
    protected $guarded = ['id'];
    public function kurir()
    {
        return $this->belongsTo(daftar_kurir::class,'kurir_id');
    }
    public function pemesan()
    {
        return $this->belongsTo(Pemesan::class, 'user_id', 'user_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
