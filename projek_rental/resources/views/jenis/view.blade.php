<x-layout>
    <!-- Cara 2 - Kirimnya/Desainya Melalui View(untuk BlankPage & Card_Title): -->
    <x-slot name="title">Detail Jenis</x-slot>
    <x-slot name="card_title">Detail Jenis :: {{ $jenis_kendaraan->id }} - {{ $jenis_kendaraan->nama }}</x-slot>
    <table class="table table-striped table-sm">
        <tr>
            <th class="w-25">Id</th>
            <td>{{ $jenis_kendaraan->id }}</td>
        </tr>
        <tr>
            <th>Nama Jenis Kendaraan</th>
            <td>{{ $jenis_kendaraan->nama }}</td>
        </tr>
        <tr>
            <th>description Jenis Kendaraan</th>
            <td>{{ $jenis_kendaraan->description }}</td>
        </tr>
    </table>
    <div>
        <a href="{{ route('jenis.show') }}" class="btn btn-success mt-2">Kembali</a>
    </div>
</x-layout>
