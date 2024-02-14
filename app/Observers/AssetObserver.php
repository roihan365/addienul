<?php

namespace App\Observers;

use App\Models\Asset;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AssetObserver
{
    public function created(Asset $asset): void
    {
        // $tenant = $asset->tenant;
        $url = strval(route('aset.show', [$asset->slug]));

        // Generate QR Code image
        $qrCode = QrCode::format('svg')->generate($url);

        // Simpan gambar QR Code ke penyimpanan dengan nama unik
        $qrCodeFileName = 'qrcode_' . $asset->id . '.svg';
        Storage::put('public/assets/qrcodes/' . $qrCodeFileName, $qrCode);

        // Simpan nama file QR Code ke dalam model Asset
        $asset->update(['qr_code' => 'assets/qrcodes/' . $qrCodeFileName]);

        // Storage::put('qrcode.svg', QrCode::generate($url));
        // $asset->addMediaFromDisk('qrcode.svg', 'local')
        // ->toMediaCollection('default', 'media_qrcode');
    }
}
