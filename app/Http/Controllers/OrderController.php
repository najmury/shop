<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $cartItems = Cart::with('produk')->where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong!');
        }

        $subtotal = $cartItems->sum(function ($item) {
            return $item->harga * $item->quantity;
        });
        $ongkir = 15000; // Default ongkir
        $total = $subtotal + $ongkir;

        return view('landing.checkout', compact('cartItems', 'subtotal', 'ongkir', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'email_penerima' => 'required|email|max:255',
            'telepon_penerima' => 'required|string|max:15',
            'alamat_pengiriman' => 'required|string',
            'kota' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
            'catatan' => 'nullable|string'
        ]);

        $cartItems = Cart::with('produk')->where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong!');
        }

        // Cek stok semua produk
        foreach ($cartItems as $item) {
            if ($item->produk->stok < $item->quantity) {
                return redirect()->route('cart.index')->with('error', 'Stok produk "' . $item->produk->nama_produk . '" tidak mencukupi!');
            }
        }

        $subtotal = $cartItems->sum(function ($item) {
            return $item->harga * $item->quantity;
        });
        $ongkir = 15000;
        $total = $subtotal + $ongkir;

        // Create order
        $order = Order::create([
            'user_id' => Auth::id(),
            'nama_penerima' => $request->nama_penerima,
            'email_penerima' => $request->email_penerima,
            'telepon_penerima' => $request->telepon_penerima,
            'alamat_pengiriman' => $request->alamat_pengiriman,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'subtotal' => $subtotal,
            'ongkir' => $ongkir,
            'total' => $total,
            'catatan' => $request->catatan,
            'status' => 'pending'
        ]);

        // Create order items dan update stok
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'produk_id' => $item->produk_id,
                'nama_produk' => $item->produk->nama_produk,
                'harga' => $item->harga,
                'quantity' => $item->quantity,
                'subtotal' => $item->harga * $item->quantity
            ]);

            // Update stok produk
            $item->produk->decrement('stok', $item->quantity);
        }

        // Clear cart
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('order.show', $order->id)->with('success', 'Pesanan berhasil dibuat!');
    }

    public function index()
    {
        $orders = Order::with('items')->where('user_id', Auth::id())->latest()->get();
        return view('landing.orders', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('items.produk')->where('user_id', Auth::id())->findOrFail($id);
        return view('landing.order-detail', compact('order'));
    }

    // Admin methods
    public function adminIndex()
    {
        $orders = Order::with('user', 'items')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,dikirim,selesai,dibatalkan'
        ]);

        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }
}
