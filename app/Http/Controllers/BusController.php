<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::all();
        return view('bus.index', compact('buses'));
    }

    public function show($id)
    {
        $bus = Bus::findOrFail($id);
        return view('bus.show', compact('bus'));
    }

    public function create()
    {
        return view('bus.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jumlah_kursi' => 'required|integer',
            'deskripsi' => 'nullable',
            'harga_per_hari' => 'required|numeric',
            'gambar' => 'nullable|image'
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $data['gambar'] = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('gambar_bus'), $data['gambar']);
        }

        Bus::create($data);
        return redirect()->route('bus.index')->with('success', 'Bus berhasil ditambahkan.');
    }
}
