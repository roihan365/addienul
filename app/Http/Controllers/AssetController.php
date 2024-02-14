<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $assets = Asset::with('category', 'images')->latest()->get();
        return view('pages.aset.index', compact('categories', 'assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssetRequest $request)
    {
        // validation
        $request->validated();
        // store data
        try {
            DB::beginTransaction();

            $asset = Asset::create([
                'kode' => $request->kode,
                'category_id' => $request->category,
                'nama' => $request->nama,
                'slug' => \Str::slug($request->nama),
                'tahun_pembelian' => $request->tahun_pembelian,
                'jumlah' => $request->jumlah,
                'satuan' => $request->satuan,
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $data = $image->store('assets/gallery', 'public');
                $asset->images()->create([
                    'path' => $data,
                    'imageable_type' => 'App\Models\Asset',
                    'imageable_id' => $asset->id,
                ]);
            }

            DB::commit();
            toast('Aset Baru Berhasil ditambahkan', 'success');
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
            Alert::error('Terjadi Kesalahan', $th->getMessage());
            return redirect()->back();
        }
        // redirect
        return redirect()->route('aset.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($asset)
    {
        $asset = Asset::where('slug', $asset)->with('category', 'images')->first();
        return view('pages.aset.show', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssetRequest $request, Asset $asset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $asset = Asset::findOrFail($id);
            Storage::disk('public')->delete($asset->images->path);
            Storage::disk('public')->delete($asset->qr_code);
            $asset->delete();

            $asset->images()->delete();
            DB::commit();
            toast('Data Aset Berhasil dihapus', 'success');

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            Alert::error('Terjadi Kesalahan', $e->getMessage());
            return redirect()->back();
        }
    }
}
