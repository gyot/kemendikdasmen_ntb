<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ziwbk extends Model
{
    protected $table = 'ziwbk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_kategori',
        'slug',
        'title',
        'content',
        'images',
        'file',
        'status',
        'viewer',
        'tags',
        'writer',
        'tanggal',
    ];

    public function url_images()
    {
        $urlnya = "";
        if ($this->images != null && $this->images != '') {
            $urlnya = asset('assets/images/zi-wbk') . '/' . $this->images;
        }
        return $urlnya;
    }

    public function url_file()
    {
        $urlnya = "";
        if ($this->file != null && $this->file != '') {
            $urlnya = asset('assets/files/zi-wbk') . '/' . $this->file;
        }
        return $urlnya;
    }

    public function status_text()
    {
        $status = HelperData::status_publish();
        return isset($status[$this->status]) ? $status[$this->status] : '';
    }

    public function teaser()
    {
        $content = $this->content;
        $str = strip_tags($content);
        $str = substr($str, 0, 250);
        return $str;
    }

    public function tags()
    {
        $tags = $this->tags;
        $ta = explode(',', $tags);
        return $ta;
    }

    public function Kategori()
    {
        return $this->belongsTo('App\Models\KategoriZiwbk', 'id_kategori', 'id');
    }
}
