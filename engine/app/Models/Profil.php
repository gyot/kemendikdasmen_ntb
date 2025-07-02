<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profil';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_kategori',
		'slug',
		'title',
		'content',
		'images',
		'status',
        'viewer',
        'tags',
        'writer',
        'tanggal'
    ];

    public function url_images()
    {
        $urlnya = "";
        if($this->images != null && $this->images != ''){
            $urlnya = asset('upload/profil').'/'.$this->images;
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

    public function teaser(){
        $content = $this->content;
        $str = strip_tags($content);
        $str = substr($str,0,250);
        return $str;
    }

       public function tags(){
        $tags = $this->tags;
        $ta = explode(',', $tags);
        return $ta;
    }

 public function getJenisAttribute()
    {
        return $this->table;
    }

    public function Kategori() {
        return $this->belongsTo('App\Models\KategoriProfil', 'id_kategori','id');
    }
}
