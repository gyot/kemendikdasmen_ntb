<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriRenstra extends Model
{
    protected $table = 'kategoriRenstra';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
		'slug',
        'images',
		'status'
    ];

    public function url_images()
    {
        $urlnya = "";
        if($this->images != null && $this->images != ''){
            $urlnya = asset('upload/renstra').'/'.$this->images;
        }
        return  $urlnya;
    }

    protected $casts = [
        'tanggal' => 'date',
    ];

public function status_text(){
        $status = HelperData::status_publish();
        return isset($status[$this->status])?$status[$this->status]:'';
    }

    public function Renstra() {
        return $this->hasMany('App\Model\Renstra', 'id', 'id_kategori');
    }
}

