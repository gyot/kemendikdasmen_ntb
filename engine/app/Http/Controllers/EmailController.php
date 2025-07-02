<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\KirimEmail;


class EmailController extends Controller
{
    public function kirimEmail($penerima, $subject, $isi, $lampiran)
    {
        // Validasi input
        if (empty($penerima) || empty($subject) || empty($isi)) {
            return response()->json(['error' => 'Penerima, subjek, dan isi email tidak boleh kosong.'], 400);
        }

        // Kirim email
        try {
            Mail::to($penerima)->send(new KirimEmail($subject, $isi, $lampiran));
            return response()->json(['success' => 'Email berhasil dikirim.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mengirim email: ' . $e->getMessage()], 500);
        }
    }

}
