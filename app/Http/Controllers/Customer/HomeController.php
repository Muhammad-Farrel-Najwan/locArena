<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\detail_transaksi;
use App\Models\lapangan;
use Illuminate\Http\Request;



class HomeController extends Controller
{
    public function index() {
        $getLapangan = detail_transaksi::with('lapangan')->selectRaw('lapangan_id, count(*) as jumlah_muncul')->groupBy('lapangan_id')->orderBy('jumlah_muncul', 'desc')->limit(15)->get();
    }
}
