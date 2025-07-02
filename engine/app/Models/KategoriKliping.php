<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKliping extends Model
{
    use HasFactory;
    protected $table = 'kategoriKliping';
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
            $urlnya = asset('upload/kliping').'/'.$this->images;
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

    public function Kliping() {
        return $this->hasMany(Kliping::class, 'id');
    }
}

