<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';
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
            $urlnya = asset('upload/pengumuman').'/'.$this->images;
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
public function teaser_title(){
        $coba = $this->title;
        $str = strip_tags($coba);
        $coba = substr($str,0,100);
        return $coba;
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
        return $this->belongsTo('App\Models\KategoriPengumuman', 'id_kategori','id');
    }
}
