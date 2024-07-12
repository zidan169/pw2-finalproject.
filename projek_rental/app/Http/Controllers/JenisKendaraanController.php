<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JenisKendaraanController extends Controller
{
    // Menampilkan daftar JenisKendaraan
    public function show()
    {
        $list_jenis = JenisKendaraan::all();
        return view('jenis.show', ['list_jenis' => $list_jenis]);
    }

    // Menampilkan form untuk menambah JenisKendaraan baru
    public function create()
    {
        $jenis_kendaraan = new JenisKendaraan();

        return view('jenis.form', [
            'jenis_kendaraan' => $jenis_kendaraan
        ]);
    }

    // Menyimpan JenisKendaraan baru atau mengupdate yang sudah ada
    public function store(Request $request)
    {
        $request['thn_beli'] = date('Y', strtotime($request['thn_beli']));
        if ($request->id) {
            JenisKendaraan::find($request->id)->update($request->all());
            return redirect(route('jenis.show'))->with('pesan', 'Data berhasil diupdate');
        } else {
            JenisKendaraan::create($request->all());
            return redirect(route('jenis.show'))->with('pesan', 'Data berhasil disimpan');
        }
    }

    public function edit($id)
    {
        $jenis_kendaraan = JenisKendaraan::find($id);
        return view('jenis.form', compact('jenis_kendaraan'));
    }

    // Mengupdate data JenisKendaraan yang sudah diubah
    public function update(Request $request, $id)
    {
        $jenis_kendaraan = JenisKendaraan::find($id);
        $jenis_kendaraan->update($request->all());
        return redirect(route('jenis.show'))->with('pesan', 'Data berhasil diupdate');
    }

    // Menampilkan detail JenisKendaraan
    public function view($id)
    {
        $jenis_kendaraan = JenisKendaraan::find($id);
        return view('jenis.view', ['jenis_kendaraan' => $jenis_kendaraan]);
    }

    // Menghapus JenisKendaraan
    public function destroy($id): RedirectResponse
    {
        JenisKendaraan::find($id)->delete();
        return redirect(route('jenis.show'))->with('pesan', 'Data berhasil dihapus');
    }
}
