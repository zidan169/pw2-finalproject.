<x-layout>
    <!-- Cara 2 - Kirimnya/Desainya Melalui View(untuk BlankPage & Card_Title): -->
    <x-slot name="title">Detail Peminjaman</x-slot>
    <x-slot name="card_title">Detail Peminjaman :: {{ $peminjaman->id }} - {{ $peminjaman->nama }}</x-slot>
    <x-slot name="card_footer"></x-slot>
    <table class="table table-striped table-sm">
        <tr>
            <th>Nama Peminjam</th>
            <td>{{ $peminjaman->nama_peminjam }}</td>
        </tr>
        <tr>
            <th>KTP Peminjam</th>
            <td>{{ $peminjaman->ktp_peminjam }}</td>
        </tr>
        <tr>
            <th>Keperluan</th>
            <td>{{ $peminjaman->keperluan_pinjam }}</td>
        </tr>
        <tr>
            <th>Tgl Mulai</th>
            <td>{{ $peminjaman->mulai }}</td>
        </tr>
        <tr>
            <th>Tgl Selesai</th>
            <td>{{ $peminjaman->selesai }}</td>
        </tr>
        <tr>
            <th>Biaya</th>
            <td>{{ $peminjaman->biaya }}</td>
        </tr>
        <tr>
            <th>Komentar Peminjam</th>
            <td>{{ $peminjaman->komentar_peminjam }}</td>
        </tr>
        <tr>
            <th>Status Pinjam</th>
            <td>{{ $peminjaman->status_pinjam }}</td>
        </tr>
        <tr>
            <th>Merk</th>
            <td>{{ $peminjaman->armada->merk }}</td>
        </tr>
        <tr>
            <th>Nopol</th>
            <td>{{ $peminjaman->armada->nopol }}</td>
        </tr>
        <tr>
            <th>Tahun Beli</th>
            <td>{{ $peminjaman->armada->thn_beli }}</td>
        </tr>
        <tr>
            <th>Jenis Kendaraan</th>
            <td>{{ $peminjaman->armada->jenis_kendaraan->nama }}</td>
        </tr>
    </table>
    <div>
        <a href="{{ route('peminjaman.show') }}" class="btn btn-success mt-2">Kembali</a>
    </div>
</x-layout>
