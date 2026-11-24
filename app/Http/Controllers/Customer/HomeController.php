<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\detail_transaksi;
use App\Models\lapangan;
use Illuminate\Http\Request;



class HomeController extends Controller
{
    public function index() {
        $getLapangan = detail_transaksi::with('lapangan')->selectRaw('lapangan_id, count(*) as jumlahMuncul')->groupBy('lapangan_id')->orderBy('jumlahMuncul', 'desc')->limit(15)->get();
    }
}
