<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'detail';
    protected $guarded = [];

    
    public function barang()
    {
        return $this->belongsTo('App\Barang','produk_id');
    }
}
