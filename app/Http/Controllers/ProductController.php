<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index',['products' => $products]);
    }
    public function create()
    {
        return view('products.create', [
            'categories' => category::all(),
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
            'discount' => 'required',
        ]);
        $input = $request->all();
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $folderTujuan = 'uploads/';
            $namaFile = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path ($folderTujuan), $namaFile);
            $input['gambar'] = $namaFile;
        }
        Product::create($input);
        return redirect(route('products.index'));
    }
    public function delete($id)
    {
        $product = Product::find($id);
        @unlink(public_path('uploads/' . $product->gambar));
        $product->delete();
        return redirect(route('products.index'));
    }

    public function edit($id)
    {
        $product = Product::findOrfail($id);
        return view('products.edit', ['product' => $product,
          'categories' => Category::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        ]);
        $input = $request->all();
        $product = Product::find($id);
        if ($request->hasFile('gambar')) {
            @unlink(public_path('uploads/' . $product->gambar));
            $file = $request->file('gambar');
            $folderTujuan = 'uploads/';
            $namaFile = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path ($folderTujuan), $namaFile);
            $input['gambar'] = $namaFile;
    }
    $product->update($input);
    return redirect(route('products.index'));
   }
}
