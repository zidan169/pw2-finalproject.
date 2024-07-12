<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use App\Models\Armada;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArmadaController extends Controller
{
    // Menampilkan daftar Armada
    public function show()
    {
        $list_armada = Armada::all();
        return view('armada.show', ['list_armada' => $list_armada]);
    }

    // Menampilkan form untuk menambah Armada baru
    public function create()
    {
        $armada = new Armada();
        $list_jenis = JenisKendaraan::all();

        return view('armada.form', [
            'armada' => $armada,
            'list_jenis' => $list_jenis,
        ]);
    }

    // Menyimpan Armada baru atau mengupdate yang sudah ada
    public function store(Request $request)
    {
        $request['thn_beli'] = date('Y', strtotime($request['thn_beli']));
        if ($request->id) {
            Armada::find($request->id)->update($request->all());
            return redirect(route('armada.show'))->with('pesan', 'Data berhasil diupdate');
        } else {
            Armada::create($request->all());
            return redirect(route('armada.show'))->with('pesan', 'Data berhasil disimpan');
        }
    }

    public function edit($id)
    {
        $armada = Armada::find($id);
        $list_jenis = JenisKendaraan::all();
        return view('armada.form', compact('armada', 'list_jenis'));
    }

    // Mengupdate data Armada yang sudah diubah
    public function update(Request $request, $id)
    {
        $armada = Armada::find($id);
        $armada->update($request->all());
        return redirect(route('armada.show'))->with('pesan', 'Data berhasil diupdate');
    }

    // Menampilkan detail Armada
    public function view($id)
    {
        $armada = Armada::find($id);
        return view('armada.view', ['armada' => $armada]);
    }

    // Menghapus Armada
    public function destroy($id): RedirectResponse
    {
        Armada::find($id)->delete();
        return redirect(route('armada.show'))->with('pesan', 'Data berhasil dihapus');
    }
}
