<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilTupoksiKategori extends Model
{
    protected $table = 'profil_tupoksi_kategori';
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
            $urlnya = asset('upload/berita').'/'.$this->images;
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

    public function Berita() {
        return $this->hasMany('App\Model\ProfilTupoksiKategori', 'id', 'id_kategori');
    }
}

