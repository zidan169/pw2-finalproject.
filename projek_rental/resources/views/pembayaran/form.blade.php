<x-layout>
    <!-- Cara 2 - Kirimnya/Desainya Melalui View(untuk BlankPage & Card_Title): -->
    <x-slot name="title">Tambah Pembayaran</x-slot>
    <x-slot name="card_title">Form Tambah Pembayaran</x-slot>
    <form action="{{ route('pembayaran.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="peminjaman_id">Peminjam</label>
            <select name="peminjaman_id" class="form-select form-select-lg mb-3">
                <option>--Pilih--</option>
                @foreach($list_peminjaman as $peminjaman)
                <option value="{{ $peminjaman->id }}" {{ $pembayaran->peminjaman?->id==$peminjaman->id ? 'selected':
                    ''}}>
                    {{ $peminjaman->nama_peminjam}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah_bayar">Jumlah Pembayaran</label>
            <input type="number" name="jumlah_bayar" id="jumlah_bayar" value="{{ $pembayaran->jumlah_bayar}}"
                class="form-control">
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal Pembayaran</label>
            <input type="date" name="tanggal" id="tanggal" value="{{ $pembayaran->tanggal }}" class="form-control">
        </div>
        <input type="hidden" name="id" value="{{ $pembayaran->id }}">
        <a href="{{ route('pembayaran.show') }}" class="btn btn-success mr-2">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</x-layout>
