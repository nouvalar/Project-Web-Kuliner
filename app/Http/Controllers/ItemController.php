<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function admin()
    {
        $items = Item::all();
        return view('admin.admin', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required|string|max:255',
        ]);

        $path = $request->file('gambar')->store('public/gambar');

        $item = new Item;
        $item->nama = $request->nama;
        $item->lokasi = $request->lokasi;
        $item->kategori = $request->kategori;
        $item->gambar = basename($path);
        $item->judul = $request->judul;
        $item->save();

        return redirect()->route('admin')->with('success', 'Item Berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        Storage::delete('public/gambar/' . $item->gambar);
        $item->delete();

        return redirect()->route('admin')->with('success', 'Item Berhasil dihapus.');
    }

    public function getLatestItems()
    {
        $latestItems = Item::orderBy('created_at', 'desc')->take(5)->get(); // Ambil 5 item terbaru
        return response()->json($latestItems);
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('admin.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required|string|max:255',
        ]);

        $item = Item::findOrFail($id);
        $item->nama = $request->nama;
        $item->lokasi = $request->lokasi;
        $item->kategori = $request->kategori;
        $item->judul = $request->judul;

        if ($request->hasFile('gambar')) {
            // Delete the old image
            Storage::delete('public/gambar/' . $item->gambar);

            // Store the new image
            $path = $request->file('gambar')->store('public/gambar');
            $item->gambar = basename($path);
        }

        $item->save();

        return redirect()->route('admin')->with('success', 'Item Berhasil diperbarui.');
    }
}
