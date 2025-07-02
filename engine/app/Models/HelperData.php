<?php

namespace App\Models;
class HelperData 
{
	public static function kategori_visimisi(){
        return array(
            1=>'visi',
            2=>'misi',
            3=>'pesan',
        );
    }

    public static function status_publish(){
        return array(
            1=>'Publish',
            2=>'Non Publish',
        );
    }

    public static function satuan(){
        return array(
            1=>'ORANG/PERHARI',
            2=>'RUANG/HARI',
            3=>'PER KEGIATAN/HR',
            4=>'ORANG/HARI/8JAM',
        );
    }

}