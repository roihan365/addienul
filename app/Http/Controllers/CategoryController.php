<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('pages.kategori.index', compact('categories'));
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
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Nama Kategori tidak boleh kosong.',
            'max' => 'Nama Kategori tidak boleh lebih dari :max karakter.',
            'unique' => 'Nama Kategori sudah ada'
        ];

        try {
            DB::beginTransaction();
            $request->validate([
                'nama' => 'required|string|max:255|unique:categories,nama',
            ], $messages);

            Category::create($request->all());
            DB::commit();
            toast('Kategori Berhasil ditambahkan', 'success');

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            Alert::error('Terjadi Kesalahan', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'Nama Kategori tidak boleh kosong.',
            'max' => 'Nama Kategori tidak boleh lebih dari :max karakter.',
            'unique' => 'Nama Kategori tidak diubah atau sudah ada.'
        ];

        try {
            DB::beginTransaction();
            $request->validate([
                'nama' => 'required|string|max:255|unique:categories,nama',
            ], $messages);

            $category = Category::findOrFail($id);
            $category->update([
                'nama' => $request->nama,
            ]);

            DB::commit();
            toast('Kategori Berhasil diubah', 'success');

            return redirect()->back();
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

            $category = Category::findOrFail($id);
            $category->delete();
            DB::commit();
            toast('Kategori Berhasil dihapus', 'success');

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            Alert::error('Terjadi Kesalahan', $e->getMessage());
            return redirect()->back();
        }
    }
}
