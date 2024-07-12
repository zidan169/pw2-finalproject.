<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\JenisKendaraan;
use App\Models\Peminjaman;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    // Menampilkan daftar Peminjaman
    public function show()
    {
        $list_peminjaman = Peminjaman::all();
        return view('peminjaman.show', ['list_peminjaman' => $list_peminjaman]);
    }

    // Menampilkan form untuk menambah Peminjaman baru
    public function create()
    {
        $peminjaman = new Peminjaman();
        $list_armada = Armada::all();

        return view('peminjaman.form', [
            'peminjaman' => $peminjaman,
            'list_armada' => $list_armada,
        ]);
    }

    // Menyimpan Peminjaman baru atau mengupdate yang sudah ada
    public function store(Request $request)
    {
        if ($request->id) {
            Peminjaman::find($request->id)->update($request->all());
            return redirect(route('peminjaman.show'))->with('pesan', 'Data berhasil diupdate');
        } else {
            Peminjaman::create($request->all());
            return redirect(route('peminjaman.show'))->with('pesan', 'Data berhasil disimpan');
        }
    }

    // Menampilkan form untuk mengedit Peminjaman
    // Menampilkan form untuk mengedit Peminjaman
    // Menampilkan form untuk mengedit Peminjaman
    public function edit($id)
    {
        $peminjaman = Peminjaman::find($id);
        $list_armada = Armada::all();
        return view('peminjaman.form', compact('peminjaman', 'list_armada'));
    }

    // Mengupdate data Peminjaman yang sudah diubah
    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->update($request->all());
        return redirect(route('peminjaman.show'))->with('pesan', 'Data berhasil diupdate');
    }

    // Menampilkan detail Peminjaman
    public function view($id)
    {
        $peminjaman = Peminjaman::find($id);
        return view('peminjaman.view', ['peminjaman' => $peminjaman]);
    }

    // Menghapus Peminjaman
    public function destroy($id): RedirectResponse
    {
        Peminjaman::find($id)->delete();
        return redirect(route('peminjaman.show'))->with('pesan', 'Data berhasil dihapus');
    }
}
