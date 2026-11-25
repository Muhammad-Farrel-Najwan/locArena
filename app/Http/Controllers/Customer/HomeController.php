<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\jenis_lapangan;
use App\Models\kota;
use App\Models\lapangan;
use App\Models\venue;

class HomeController extends Controller
{
    public function landing()
    {
        if (auth()->check()) {
            return redirect()->route(match (auth()->user()->role) {
                'admin' => 'admin.dashboard',
                'owner' => 'owner.dashboard',
                default => 'customer.home',
            });
        }

        $venueUnggulan = venue::query()
            ->where('status_verifikasi', true)
            ->with([
                'kecamatan.kota.provinsi',
                'lapangan' => fn ($query) => $query->where('status', 'aktif')->with('rating'),
            ])
            ->orderByDesc('id')
            ->limit(6)
            ->get();

        $venueUnggulan->each(function (venue $v) {
            $v->harga_mulai = $v->lapangan->min('harga_per_jam');
            $v->rata_rating = $v->lapangan->flatMap->rating->avg('nilai_rating');
            $v->jumlah_ulasan = $v->lapangan->flatMap->rating->count();
        });

        $jenisList = jenis_lapangan::withCount('lapangan')
            ->orderBy('nama_lapangan')
            ->get();

        $kotaList = kota::with('provinsi')
            ->orderBy('nama_kota')
            ->get();

        $statistik = [
            'venue' => venue::where('status_verifikasi', true)->count(),
            'lapangan' => lapangan::where('status', 'aktif')->count(),
            'kota' => kota::count(),
        ];

        return view('landing', compact('venueUnggulan', 'jenisList', 'kotaList', 'statistik'));
    }

    public function index()
    {
        return view('customer.home');
    }
}
