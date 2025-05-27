<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;


class SatuanController extends Controller
{
    //

    public function index(): View
    {
        $satuans = Satuan::latest()->paginate(10);
        return view('satuans.index', compact('satuans'));
    }

    public function create(): view
    {
        return view('satuans.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:5',
            'descripsi' => 'required|min:5',
        ]);
        Satuan::create([
            'name' => $request->name,
            'descripsi' => $request->descripsi,
        ]);
        //redirect to index
        return redirect()->route('satuans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $satuan = Satuan::findOrFail($id);
        return view('satuans.show', compact('satuan'));
    }
    public function edit(string $id): View
    {
        $satuan = Satuan::findOrFail($id);
        return view('satuans.edit', compact('satuan'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:5',
            'descripsi' => 'required|min:5',
        ]);
        $satuan = Satuan::findOrFail($id);
        $satuan->update([
            'name' => $request->name,
            'descripsi' => $request->descripsi,
        ]);
        return redirect()->route('satuans.index')->with(['success' => 'data berhasil di ubah']);
    }
    public function destroy($id): RedirectResponse
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();
        return redirect()->route('satuans.index')->with(['success' => "Data berhasil di hapus!"]);

    }
}
