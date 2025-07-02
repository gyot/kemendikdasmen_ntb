<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriPerjanjiankinerja extends Model
{
    protected $table = 'kategoriPerjanjiankinerja';
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
            $urlnya = asset('upload/perjanjiankinerja').'/'.$this->images;
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

    public function Perjanjiankinerja() {
        return $this->hasMany('App\Model\Perjanjiankinerja', 'id', 'id_kategori');
    }
}

