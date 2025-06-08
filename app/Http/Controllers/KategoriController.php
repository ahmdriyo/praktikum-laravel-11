<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

class KategoriController extends Controller
{
    //

    public function index(): View
    {
        $kategoris = Kategori::latest()->paginate(10);
        return view('kategoris.index', compact('kategoris'));
    }


    public function create(): view
    {
        return view('kategoris.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:5',
        ]);
        Kategori::create([
            'name' => $request->name,
        ]);
        //redirect to index
        return redirect()->route('kategoris.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategoris.show', compact('kategori'));
    }
    public function edit(string $id): View
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategoris.edit', compact('kategori'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:5',
        ]);
        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'name' => $request->name,
        ]);
        return redirect()->route('kategoris.index')->with(['success' => 'data berhasil di ubah']);
    }
    public function destroy($id): RedirectResponse
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategoris.index')->with(['success' => "Data berhasil di hapus!"]);

    }
    public function printPDF()
    {
        $kategoris = Kategori::get();
        $data = [
            'title' => 'Welcome To fti.uniska-bjm.ac.id',
            'date' => date('m/d/Y'),
            'kategoris' => $kategoris
        ];
        $pdf = PDF::loadview('printKategoriPdf', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('Data Kategori.pdf', array("attachment" => false));
    }
}
