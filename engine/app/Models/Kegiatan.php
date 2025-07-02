<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';
    protected $fillable = [
        'nama_kegiatan','id_seksi', 'tanggal_mulai', 'tanggal_selesai','pola', 'img', 'link', 'status'
    ];

    public function url_images()
    {
        $urlnya = "";
        if ($this->img != null && $this->img != '') {
            $urlnya = asset('/thumbnail') . '/' . $this->img;
        }
        return $urlnya;
    }
}
