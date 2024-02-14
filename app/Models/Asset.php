<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode',
        'category_id',
        'nama',
        'slug',
        'tahun_pembelian',
        'jumlah',
        'satuan',
        'qr_code',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->morphOne(Images::class, 'imageable');
    }
}
