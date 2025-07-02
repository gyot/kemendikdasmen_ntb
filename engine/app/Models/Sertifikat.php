<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    protected $table = 'sertifikat';
    protected $primaryKey = 'id_sertifikat';
    protected $fillable = [
        'nomor_sertifikat',
        'nama_kegiatan',
        'tanggal_kegiatan',
        'pola',
        'nama_peserta',
        'instansi_peserta',
        'slug'
    ];

    public function nomor_sertifikat(){
        $content = $this->content;
        $str = strip_tags($content);
        $str = substr($str,0,250);
        return $str;
    }

    public function nama_kegiatan(){
        $tags = $this->tags;
        $ta = explode(',', $tags);
        return $ta;
    }
    
    public function tanggal_kegiatan(){
        $content = $this->content;
        $str = strip_tags($content);
        $str = substr($str,0,250);
        return $str;
    }

    public function pola(){
        $tags = $this->tags;
        $ta = explode(',', $tags);
        return $ta;
    }
    
    public function nama_peserta(){
        $content = $this->content;
        $str = strip_tags($content);
        $str = substr($str,0,250);
        return $str;
    }

    public function instansi_peserta(){
        $tags = $this->tags;
        $ta = explode(',', $tags);
        return $ta;
    }
    
    public function slug(){
        $content = $this->content;
        $str = strip_tags($content);
        $str = substr($str,0,250);
        return $str;
    }
}
