<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seksi extends Model
{
    protected $table = 'seksi';
    protected $primaryKey = 'id';
    protected $fillable = [
		
        'nama_seksi'
    ];

    

}
