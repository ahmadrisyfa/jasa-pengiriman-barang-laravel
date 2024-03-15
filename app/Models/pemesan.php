<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesan extends Model
{
    use HasFactory;
    protected $table ='pemesan';
    protected $primaryKey='id';
   
    // protected $fillable= array('user_id','nama','kecamatan','desa','detail_rumah','no_hp','created_at','update_at');
    protected $guarded=['id'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
