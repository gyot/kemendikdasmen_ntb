<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriVideo extends Model
{
    protected $table = 'galerivideo';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
		'link',
    ];
}

