<x-layout>
    <!-- Cara 2 - Kirimnya/Desainya Melalui View(untuk BlankPage & Card_Title): -->
    <x-slot name="title">Tambah Jenis Kendaraan</x-slot>
    <x-slot name="card_title">Form Tambah Jenis Kendaraan</x-slot>
    <form action="{{ route('jenis.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Jenis Kendaraan</label>
            <input type="text" name="nama" id="nama" value="{{ $jenis_kendaraan->nama }}" class="form-control">
        </div>
        <input type="hidden" name="id" value="{{ $jenis_kendaraan->id }}">
        <a href="{{ route('jenis.show') }}" class="btn btn-success mr-2">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</x-layout>
