<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sarpras extends Model
{
    protected $table = 'sarpras';
    protected $primaryKey = 'id';
    protected $fillable = [
		'slug',
		'title',
		'content',
		'images',
		'status',
        'satuan',
        'harga'
    ];

    public function url_images()
    {
        $urlnya = "";
        if($this->images != null && $this->images != ''){
            $urlnya = asset('upload/gallery').'/'.$this->images;
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

    public function satuan_text(){
        $status = HelperData::satuan();
        return isset($status[$this->satuan])?$status[$this->satuan]:'';
    }

}
