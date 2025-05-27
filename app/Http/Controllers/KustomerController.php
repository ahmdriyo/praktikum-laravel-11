<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kustomer;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;


class KustomerController extends Controller
{
    //

    public function index(): View
    {
        $kustomers = Kustomer::latest()->paginate(10);
        return view('kustomers.index', compact('kustomers'));
    }


    public function create(): view
    {
        return view('kustomers.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nik' => 'required|numeric',
            'name' => 'required|min:5',
            'telp' => 'required|numeric',
            'email' => 'required|min:5',
            'alamat' => 'required|min:5',
        ]);
        //create kustomer
        Kustomer::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'telp' => $request->telp,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);
        //redirect to index
        return redirect()->route('kustomers.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function show(string $id): View
    {
        $kustomer = Kustomer::findOrFail($id);
        return view('kustomers.show', compact('kustomer'));
    }

    public function edit(string $id): View
    {
        $kustomer = Kustomer::findOrFail($id);
        return view('kustomers.edit', compact('kustomer'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nik' => 'required|numeric',
            'name' => 'required|min:5',
            'telp' => 'required|numeric',
            'email' => 'required|min:5',
            'alamat' => 'required|min:5',
        ]);
        $kustomer = Kustomer::findOrFail($id);
        $kustomer->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'telp' => $request->telp,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);
        return redirect()->route('kustomers.index')->with(['success' => 'data berhasil di ubah']);
    }
    public function destroy($id): RedirectResponse
    {
        $kustomer = Kustomer::findOrFail($id);
        Storage::delete('public/kustomers/' . $kustomer->image);
        $kustomer->delete();
        return redirect()->route('kustomers.index')->with(['success' => "Data berhasil di hapus!"]);

    }
}
