<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_order', 'user_id', 'nama_penerima', 'email_penerima',
        'telepon_penerima', 'alamat_pengiriman', 'kota', 'kode_pos',
        'subtotal', 'ongkir', 'total', 'status', 'catatan'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            if (empty($order->kode_order)) {
                $order->kode_order = 'ORD' . date('Ymd') . str_pad(Order::count() + 1, 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getStatusLabelAttribute()
    {
        $statuses = [
            'pending' => 'Menunggu Pembayaran',
            'diproses' => 'Diproses',
            'dikirim' => 'Dikirim',
            'selesai' => 'Selesai',
            'dibatalkan' => 'Dibatalkan'
        ];

        return $statuses[$this->status] ?? $this->status;
    }

    public function getStatusColorAttribute()
    {
        $colors = [
            'pending' => 'warning',
            'diproses' => 'info',
            'dikirim' => 'primary',
            'selesai' => 'success',
            'dibatalkan' => 'danger'
        ];

        return $colors[$this->status] ?? 'secondary';
    }
}
