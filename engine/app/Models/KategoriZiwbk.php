<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriZiwbk extends Model
{
    protected $table = 'kategoriZiwbk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'slug',
        'images',
        'status',
    ];

    public function url_images()
    {
        $urlnya = "";
        if ($this->images != null && $this->images != '') {
            $urlnya = asset('assets/images/zi-wbk') . '/' . $this->images;
        }
        return $urlnya;
    }

    public function status_text()
    {
        $status = HelperData::status_publish();
        return isset($status[$this->status]) ? $status[$this->status] : '';
    }

    public function Berita()
    {
        return $this->hasMany('App\Model\Ziwbk', 'id', 'id_kategori');
    }
}
