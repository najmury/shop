<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['kode_kategori', 'nama_kategori'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kategori) {
            if (empty($kategori->kode_kategori)) {
                $lastKategori = static::latest()->first();
                $lastNumber = $lastKategori ? intval(substr($lastKategori->kode_kategori, 3)) : 0;
                $kategori->kode_kategori = 'KTG' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
            }
        });
    }

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}
