<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function home()
    {
        $kategoris = Kategori::where('status', 'Aktif')->get();
        $featuredProducts = Produk::active()
            ->with('kategori')
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        $bestSellerProducts = Produk::active()
            ->with('kategori')
            ->orderBy('stok', 'desc')
            ->take(6)
            ->get();

        return view('landing.home', compact('featuredProducts', 'bestSellerProducts', 'kategoris'));
    }

    public function shop(Request $request)
    {
        $query = Produk::active()->with('kategori');

        if ($request->has('kategori') && $request->kategori) {
            $query->where('kategori_id', $request->kategori);
        }

        if ($request->has('min_price') && $request->min_price) {
            $query->where('harga', '>=', $request->min_price);
        }

        if ($request->has('max_price') && $request->max_price) {
            $query->where('harga', '<=', $request->max_price);
        }

        if ($request->has('search') && $request->search) {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('harga', 'asc');
                break;
            case 'price_high':
                $query->orderBy('harga', 'desc');
                break;
            case 'name':
                $query->orderBy('nama_produk', 'asc');
                break;
            default:
                $query->latest();
                break;
        }

        $produks = $query->paginate(12);
        $kategoris = Kategori::where('status', 'Aktif')->get();

        return view('landing.shop', compact('produks', 'kategoris'));
    }

    public function categories()
    {
        $kategoris = Kategori::withCount(['produks' => function($query) {
            $query->active();
        }])->where('status', 'Aktif')->get();

        return view('landing.categories', compact('kategoris'));
    }

    public function category($id)
    {
        $kategori = Kategori::findOrFail($id);
        $produks = Produk::active()
            ->where('kategori_id', $kategori->id)
            ->with('kategori')
            ->paginate(12);

        $kategoris = Kategori::where('status', 'Aktif')->get();

        return view('landing.category', compact('kategori', 'produks', 'kategoris'));
    }

    public function promo()
    {
        $promoProducts = Produk::active()
            ->with('kategori')
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        $kategoris = Kategori::where('status', 'Aktif')->get();

        return view('landing.promo', compact('promoProducts', 'kategoris'));
    }

    public function contact()
    {
        $kategoris = Kategori::where('status', 'Aktif')->get();
        return view('landing.contact', compact('kategoris'));
    }

    public function about()
    {
        $kategoris = Kategori::where('status', 'Aktif')->get();
        return view('landing.about', compact('kategoris'));
    }

    public function productDetail($id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);
        $relatedProducts = Produk::active()
            ->where('kategori_id', $produk->kategori_id)
            ->where('id', '!=', $produk->id)
            ->take(4)
            ->get();

        $kategoris = Kategori::where('status', 'Aktif')->get();

        return view('landing.product-detail', compact('produk', 'relatedProducts', 'kategoris'));
    }
}
