<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!session()->has('keyAdmin')){
            return redirect()->route('admin.login');
        }
        sleep(2);
        if($request->input('key')){
            $categories = Category::whereAny(['nama_category', 'deskripsi_category'],'LIKE','%'.$request->input('key').'%')->paginate(15);
        }else{
            $categories = Category::paginate(15);
        }
        return view('admin.AdminCategory.data-category', compact([
            'categories',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
        public function create()
    {
        return view('admin.AdminCategory.create-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_category' => 'required|string',
            'deskripsi_category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nama_category.required' => 'Nama category wajib di isi!!',
            'deskripsi_category.required' => 'Deskripsi wajib di isi!!',
            'image.max' => 'Size foto terlalu besar!!',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Category::create([
            'nama_category' => $request->nama_category,
            'deskripsi_category' => $request->deskripsi_category,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.category')->with('tambahData', 'Data Category berhasil ditambahkan!!');
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
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.AdminCategory.edit-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_category' => 'required|string|unique:categories,nama_category',
            'deskripsi_category' => 'required|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nama_category.required' => 'Nama category wajib di isi!!',
            'nama_category.unique' => 'Nama category sudah pernah!!',
            'deskripsi_category.required' => 'Deskripsi joki wajib di isi!!',
            'deskripsi_category.max' => 'Batas teks hanya 100 digit',
        ]);

        $category = Category::where('id', $id)->first();

        $imagePath = $category->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Category::where('id', $request->id)->update([
            'nama_category' => $request->nama_category,
            'deskripsi_category' => $request->deskripsi_category,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.category')->with('updateData', 'Data berhasil di update!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Category::where('id', $request->id)->delete();
        return redirect()->route('admin.category')->with('deleteData', 'Data berhasil di hapus!!');
    }
}
