<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
class ProductController extends Controller
{
    //

    public function index(): View
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }


    public function create(): view
    {
        return view('products.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);
        //upload image
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());
        //create product
        Product::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
        ]);
        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function show(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        //check if image is uploaded
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());
            //delete old image
            Storage::delete('public/products/' . $product->image);
            //update product with new image
            $product->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
        } else {
            //update product without image
            $product->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
        }
        return redirect()->route('products.index')->with(['success' => 'data berhasil di ubah']);
    }
    public function destroy($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        Storage::delete('public/products/' . $product->image);
        $product->delete();
        return redirect()->route('products.index')->with(['success' => "Data berhasil di hapus!"]);

    }

    public function printPDF()
    {
        $products = Product::get();
        $data = [
            'title' => 'Welcome To fti.uniska-bjm.ac.id',
            'date' => date('m/d/Y'),
            'products' => $products
        ];
        $pdf = PDF::loadview('printProductPdf', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('Data Product.pdf', array("attachment" => false));
    }
}
