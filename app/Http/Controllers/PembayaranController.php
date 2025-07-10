<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'rental_id' => 'required|integer',
            'metode' => 'required|in:transfer,ewallet',
            'jumlah' => 'required|numeric',
            'bukti' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('bukti');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('bukti'), $filename);

        Pembayaran::create([
            'rental_id' => $request->rental_id,
            'metode' => $request->metode,
            'jumlah' => $request->jumlah,
            'bukti' => $filename,
        ]);

        return back()->with('success', 'Bukti pembayaran berhasil dikirim.');
    }
}
