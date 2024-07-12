<x-layout>
    <!-- Cara 2 - Kirimnya/Desainya Melalui View(untuk BlankPage & Card_Title): -->
    <x-slot name="title">Tambah Mobil</x-slot>
    <x-slot name="card_title">Form Tambah Mobil</x-slot>
    <form action="{{ route('armada.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="merk">Merk Mobil</label>
            <input type="text" name="merk" id="merk" value="{{ $armada->merk }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="nopol">Plat Nomor</label>
            <input type="text" name="nopol" id="nopol" value="{{ $armada->nopol}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="thn_beli">Tahun Beli</label>
            <input type="date" name="thn_beli" id="thn_beli" value="{{ date('Y-m-d', strtotime($armada->thn_beli ?? now())) }}"
                class="form-control">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $armada->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label for="kapasitas_kursi">Kapasitas Kursi</label>
            <input type="number" name="kapasitas_kursi" id="kapasitas_kursi" value="{{ $armada->kapasitas_kursi}}"
                class="form-control">
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" name="rating" id="rating" value="{{ $armada->rating}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="jenis_kendaraan_id">Jenis Kendaraan</label>
            <select name="jenis_kendaraan_id" class="form-select form-select-lg mb-3">
                <option>--Pilih--</option>
                @foreach($list_jenis as $jenis)
                <option value="{{ $jenis->id }}" {{ $jenis->jenis_kendaraan_id==$jenis->id ? 'selected': ''}}>
                    {{ $jenis->nama}}
                </option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="id" value="{{ $armada->id }}">
        <a href="{{ route('armada.show') }}" class="btn btn-success mr-2">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</x-layout>
