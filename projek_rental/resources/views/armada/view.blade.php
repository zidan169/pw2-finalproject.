<x-layout>
    <!-- Cara 2 - Kirimnya/Desainya Melalui View(untuk BlankPage & Card_Title): -->
    <x-slot name="title">Detail Mobil</x-slot>
    <x-slot name="card_title">Detail Mobil :: {{ $armada->id }} - {{ $armada->nama }}</x-slot>
    <table class="table table-striped table-sm">
        <tr>
            <th class="w-25">Id</th>
            <td>{{ $armada->id }}</td>
        </tr>
        <tr>
            <th>Merk</th>
            <td>{{ $armada->merk }}</td>
        </tr>
        <tr>
            <th>Plat Nomor</th>
            <td>{{ $armada->nopol }}</td>
        </tr>
        <tr>
            <th>Tahun Beli</th>
            <td>{{ $armada->thn_beli }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $armada->deskripsi }}</td>
        </tr>
        <tr>
            <th>Kapasitas Kursi</th>
            <td>{{ $armada->kapasitas_kursi }}</td>
        </tr>
        <tr>
            <th>Rating</th>
            <td>{{ $armada->rating }}</td>
        </tr>
        <tr>
            <th>Jenis Kendaraan</th>
            <td>{{ $armada->jenis_kendaraan->nama }}</td>
        </tr>
    </table>
    <div>
        <a href="{{ route('armada.show') }}" class="btn btn-success mt-2">Kembali</a>
    </div>
</x-layout>
