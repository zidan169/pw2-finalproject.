<x-layout>
    <!-- Cara 2 - Kirimnya/Desainya Melalui View(untuk BlankPage & Card_Title): -->
    <x-slot name="title">Tambah Peminjam</x-slot>
    <x-slot name="card_title">Form Tambah Peminjam</x-slot>
    <x-slot name="card_footer"></x-slot>
    <form action="{{ route('peminjaman.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama_peminjam">Nama Peminjam</label>
            <input type="text" name="nama_peminjam" id="nama_peminjam" value="{{ $peminjaman->nama_peminjam }}"
                class="form-control">
        </div>
        <div class="form-group">
            <label for="ktp_peminjam">KTP Peminjam</label>
            <input type="text" name="ktp_peminjam" id="ktp_peminjam" value="{{ $peminjaman->ktp_peminjam}}"
                class="form-control">
        </div>
        <div class="form-group">
            <label for="keperluan_pinjam">Keperluan</label>
            <input type="text" name="keperluan_pinjam" id="keperluan_pinjam" value="{{ $peminjaman->keperluan_pinjam}}"
                class="form-control">
        </div>
        <div class="form-group">
            <label for="mulai">Tgl Mulai</label>
            <input type="date" name="mulai" id="mulai" value="{{ $peminjaman->mulai}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="selesai">Tgl Selesai</label>
            <input type="date" name="selesai" id="selesai" value="{{ $peminjaman->selesai}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="biaya">Biaya</label>
            <input type="number" name="biaya" id="biaya" value="{{ $peminjaman->biaya}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="komentar_peminjam">Komentar</label>
            <textarea name="komentar_peminjam" id="komentar_peminjam"
                class="form-control">{{ $peminjaman->komentar_peminjam }}</textarea>
        </div>
        <div class="form-group">
            <label for="status_pinjam">Status</label>
            <input type="string" name="status_pinjam" id="status_pinjam" value="{{ $peminjaman->status_pinjam}}"
                class="form-control">
        </div>
        <div class="form-group">
            <label for="armada_id">Armada</label>
            <select name="armada_id" class="form-select form-select-lg mb-3">
                <option>--Pilih--</option>
                @foreach($list_armada as $armada)
                <option value="{{ $armada->id }}" {{ $peminjaman->armada_id==$armada->id ? 'selected': ''}}>
                    {{ "[".$armada->merk."]" .' - '. $armada->jenis_kendaraan->nama .' ['. $armada->nopol .'] '.
                    $armada->thn_beli}}
                </option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="id" value="{{ $peminjaman->id }}">
        <a href="{{ route('peminjaman.show') }}" class="btn btn-success mr-2">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</x-layout>
