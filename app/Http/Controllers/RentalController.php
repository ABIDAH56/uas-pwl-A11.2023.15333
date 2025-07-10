<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Bus;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::where('user_id', Auth::id())->get();
        return view('rental.index', compact('rentals'));
    }

    public function create($bus_id)
    {
        $bus = Bus::findOrFail($bus_id);
        return view('rental.create', compact('bus'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $bus = Bus::findOrFail($data['bus_id']);
        $days = (strtotime($data['tanggal_selesai']) - strtotime($data['tanggal_mulai'])) / 86400;
        $data['total_harga'] = $days * $bus->harga_per_hari;
        $data['user_id'] = Auth::id();
        $data['status'] = 'pending';

        Rental::create($data);
        return redirect()->route('rental.index')->with('success', 'Pemesanan berhasil dilakukan.');
    }
}
