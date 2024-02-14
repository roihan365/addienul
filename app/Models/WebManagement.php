<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebManagement extends Model
{
    use HasFactory;
    protected $fillable = [
        'hero_background',
        'hero_title',
        'hero_subtitle',
        'hero_button_text',
        'hero_button_url',
        'kajian_title',
        'kajian_subtitle',
        'infaq_title',
        'infaq_subtitle',
        'infaq_image',
        'informasi_address',
        'informasi_phone1',
        'informasi_phone2',
        'informasi_email',
    ];
}
