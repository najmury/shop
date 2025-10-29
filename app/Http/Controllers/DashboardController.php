<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Order;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $dataUsers = User::get()->count();
        $dataKategoris = Kategori::get()->count();
        $dataProduks = Produk::get()->count();
        $dataPesanan = Order::get()->count();
        return view('dashboard',compact('dataUsers','dataKategoris','dataProduks','dataPesanan'));
    }
}
