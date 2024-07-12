<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Peminjaman;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // Menampilkan daftar Pembayaran
    public function show()
    {
        $list_pembayaran = Pembayaran::all();
        return view('pembayaran.show', ['list_pembayaran' => $list_pembayaran]);
    }

    // Menampilkan form untuk menambah Pembayaran baru
    public function create()
    {
        $pembayaran = new Pembayaran();
        $list_peminjaman = Peminjaman::whereDoesntHave('pembayaran')->get();

        return view('pembayaran.form', [
            'pembayaran' => $pembayaran,
            'list_peminjaman' => $list_peminjaman,
        ]);
    }

    // Menyimpan Pembayaran baru atau mengupdate yang sudah ada
    public function store(Request $request)
    {
        if ($request->id) {
            Pembayaran::find($request->id)->update($request->all());
            return redirect(route('pembayaran.show'))->with('pesan', 'Data berhasil diupdate');
        } else {
            $pembayaran = Pembayaran::create($request->all());
            if ($pembayaran) {
                $peminjaman = Peminjaman::find($request->peminjaman_id);
                $peminjaman->update(['status_pinjam' => 'Sudah dibayar']);
            }
            return redirect(route('pembayaran.show'))->with('pesan', 'Data berhasil disimpan');
        }
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::find($id);
        $list_peminjaman = Peminjaman::all();
        return view('pembayaran.form', compact('pembayaran', 'list_peminjaman'));
    }

    // Mengupdate data Pembayaran yang sudah diubah
    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::find($id);
        $pembayaran->update($request->all());
        return redirect(route('pembayaran.show'))->with('pesan', 'Data berhasil diupdate');
    }

    // Menampilkan detail Pembayaran
    public function view($id)
    {
        $pembayaran = Pembayaran::find($id);
        return view('pembayaran.view', ['pembayaran' => $pembayaran]);
    }

    // Menghapus Pembayaran
    public function destroy($id): RedirectResponse
    {
        $pembayaran = Pembayaran::find($id);
        if ($pembayaran) {
            $peminjaman = Peminjaman::find($pembayaran->peminjaman_id);
            $peminjaman->update(['status_pinjam' => 'Belum dibayar']);
            $pembayaran->delete();
        }
        return redirect(route('pembayaran.show'))->with('pesan', 'Data berhasil dihapus');
    }
}
