<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TugasPokok extends Model
{
    protected $table = 'tugas_pokok';
    protected $primaryKey = 'id';
    protected $fillable = [
		'content',
        'title',
        'images'
    ];

    public function url_images()
    {
        $urlnya = "";
        if($this->images != null && $this->images != ''){
            $urlnya = asset('upload/gallery').'/'.$this->images;
        }
        return  $urlnya;
    }

}
