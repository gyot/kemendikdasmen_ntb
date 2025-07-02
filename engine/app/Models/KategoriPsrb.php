<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriPsrb extends Model
{
    protected $table = 'kategoriPsrb';
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
            $urlnya = asset('upload/psrb').'/'.$this->images;
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

    public function Psrb() {
        return $this->hasMany('App\Model\Psrb', 'id', 'id_kategori');
    }
}

