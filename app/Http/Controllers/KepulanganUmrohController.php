<?php

namespace App\Http\Controllers;

use App\Models\KepulanganUmroh;
use Illuminate\Http\Request;

class KepulanganUmrohController extends Controller
{
    /**
     * Tampilkan semua data Kepulangan Umroh.
     */
    public function index(Request $request)
{
    // Query data KepulanganUmroh dengan pencarian (jika ada)
    $query = KepulanganUmroh::query();

    if ($search = $request->input('search')) {
        $query->where('nama_jemaah', 'like', '%' . $search . '%');
    }

    // Ambil semua data (atau data hasil pencarian)
    $kepulanganUmrohs = $query->get();

    // Kirim data ke view
    return view('kepulangan.index', compact('kepulanganUmrohs'));
}




    /**
     * Tampilkan form tambah data Kepulangan Umroh.
     */
    public function create()
    {
        return view('kepulangan.create');
    }

    /**
     * Simpan data baru Kepulangan Umroh ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_jemaah' => 'required|string|max:255',
            'tanggal_kepulangan' => 'required|date',
            'status_kepulangan' => 'required|in:Menunggu,Selesai,Tertunda',
            'catatan' => 'nullable|string',
        ]);

        // Simpan data
        KepulanganUmroh::create($request->all());

        return redirect()->route('kepulangan.index')->with('success', 'Data Kepulangan berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit data Kepulangan Umroh.
     */
    public function edit($id)
    {
        $kepulangan = KepulanganUmroh::findOrFail($id);

        return view('kepulangan.edit', compact('kepulangan'));
    }

    /**
     * Update data Kepulangan Umroh di database.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_jemaah' => 'required|string|max:255',
            'tanggal_kepulangan' => 'required|date',
            'status_kepulangan' => 'required|in:Menunggu,Selesai,Tertunda',
            'catatan' => 'nullable|string',
        ]);

        // Update data
        $kepulangan = KepulanganUmroh::findOrFail($id);
        $kepulangan->update($request->all());

        return redirect()->route('kepulangan.index')->with('success', 'Data Kepulangan berhasil diperbarui!');
    }

    /**
     * Hapus data Kepulangan Umroh dari database.
     */
    public function destroy($id)
    {
        $kepulangan = KepulanganUmroh::findOrFail($id);
        $kepulangan->delete();

        return redirect()->route('kepulangan.index')->with('success', 'Data Kepulangan berhasil dihapus!');
    }
}
