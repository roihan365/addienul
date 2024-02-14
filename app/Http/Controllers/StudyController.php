<?php

namespace App\Http\Controllers;

use App\Models\Study;
use App\Http\Requests\StoreStudyRequest;
use App\Http\Requests\UpdateStudyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studies = Study::with('image')->latest()->get();
        return view('pages.kajian.index', compact('studies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kajian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'nama_kajian' => 'required|string|max:255',
                'tanggal_kajian' => 'required|date_format:Y-m-d\TH:i',
                'pemateri' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'url_live' => 'required|string|max:255',
            ]);

            $slug = \Str::slug($request->nama_kajian);

            // Add slug to the request data
            $data = $request->all();
            $data['slug'] = $slug;

            // Create the Study using the updated request data
            $study = Study::create($data);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $data = $image->store('assets/kajian', 'public');
                $study->image()->create([
                    'path' => $data,
                    'imageable_type' => 'App\Models\Study',
                    'imageable_id' => $study->id,
                ]);
            }

            DB::commit();
            toast('Kajian berhasil ditambahkan', 'success');
            return redirect()->route('kajian.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $study = Study::findOrFail($id);
        return view('pages.kajian.edit', compact('study'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'nama_kajian' => 'required|string|max:255',
                'tanggal_kajian' => 'required|date_format:Y-m-d\TH:i',
                'pemateri' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'url_live' => 'required|string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $study = Study::findOrFail($id);
            $study->update($request->all());

            if ($request->hasFile('image')) {
                // Delete the existing image
                if ($study->image) {
                    Storage::disk('public')->delete($study->image->path);
                    $study->image->delete();
                }

                // Upload the new image
                $image = $request->file('image');
                $data = $image->store('assets/kajian', 'public');

                // Create or update the image record
                    $study->image()->create([
                        'path' => $data,
                        'imageable_type' => 'App\Models\Study',
                        'imageable_id' => $study->id,
                    ]);
            }

            DB::commit();
            toast('Data Kajian Berhasil diubah', 'success');

            return redirect()->route('kajian.index');
        } catch (\Exception $e) {
            DB::rollBack();

            Alert::error('Terjadi Kesalahan', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $study = Study::findOrFail($id);
            Storage::disk('public')->delete($study->image->path);
            $study->delete();
            //delete image
            $study->image()->delete();
            DB::commit();
            toast('Data Kajian Berhasil dihapus', 'success');

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            Alert::error('Terjadi Kesalahan', $e->getMessage());
            return redirect()->back();
        }
    }
}
