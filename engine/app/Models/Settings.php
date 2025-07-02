<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'logo',
		'title',
        'footer',
        'favicon',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'whatsapp',
        'alamat',
        'phone',
        'hp',
        'email',
        'map',
    ];

    public function url_logo()
    {
        $urlnya = "";
        if($this->logo != null && $this->logo != ''){
            $urlnya = asset('upload/settings').'/'.$this->logo;
        }
        return  $urlnya;
    }

    public function url_favicon()
    {
        $urlnya = "";
        if($this->favicon != null && $this->favicon != ''){
            $urlnya = asset('upload/settings').'/'.$this->favicon;
        }
        return  $urlnya;
    }

}

