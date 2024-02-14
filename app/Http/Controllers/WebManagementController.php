<?php

namespace App\Http\Controllers;

use App\Models\WebManagement;
use App\Http\Requests\StoreWebManagementRequest;
use App\Http\Requests\UpdateWebManagementRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebManagementController extends Controller
{
    public function landing()
    {
        $data = WebManagement::find(1);
        return view('pages.home', compact('data'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = WebManagement::find(1);
        return view('pages.web.manajemen', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $webManagementData = $request->all();
        // $webManagementData = [
        //     'hero_title' => $request->hero_title,
        //     'hero_subtitle' => $request->hero_subtitle,
        //     'hero_button_text' => $request->hero_button_text,
        //     'hero_button_url' => $request->hero_button_url,
        //     'kajian_title' => $request->kajian_title,
        //     'kajian_subtitle' => $request->kajian_subtitle,
        //     'infaq_title' => $request->infaq_title,
        //     'infaq_subtitle' => $request->infaq_subtitle,
        //     'informasi_address' => $request->informasi_address,
        //     'informasi_phone1' => $request->informasi_phone1,
        //     'informasi_phone2' => $request->informasi_phone2,
        //     'informasi_email' => $request->informasi_email,
        // ];

        if ($request->hasFile('hero_background')) {
            $image = $request->file('hero_background');
            $heroBackgroundPath = $image->store('assets/web-management/herobg', 'public');
            $webManagementData['hero_background'] = $heroBackgroundPath;
        }

        if ($request->hasFile('infaq_image')) {
            $image = $request->file('infaq_image');
            $infaqImagePath = $image->store('assets/web-management/infaqimg', 'public');
            $webManagementData['infaq_image'] = $infaqImagePath;
        }

        $webManagement = WebManagement::findOrFail(1);
        $webManagement->update($webManagementData);

        return redirect()->route('web.index')->with('success', 'Data berhasil diperbarui');
    }
}
