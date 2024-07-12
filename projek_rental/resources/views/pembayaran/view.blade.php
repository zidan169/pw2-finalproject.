<x-layout>
    <!-- Cara 2 - Kirimnya/Desainya Melalui View(untuk BlankPage & Card_Title): -->
    <x-slot name="title">Detail Pembayaran</x-slot>
    <x-slot name="card_title">Detail Pembayaran :: {{ $pembayaran->id }} - {{ $pembayaran->nama }}</x-slot>
    <table class="table table-striped table-sm">
        <tr>
            <th class="w-25">Id</th>
            <td>{{ $pembayaran->id }}</td>
        </tr>
        <tr>
            <th>Tanggal Mulai</th>
            <td>{{ $pembayaran->peminjaman->mulai }}</td>
        </tr>
        <tr>
            <th>Tanggal Selesai</th>
            <td>{{ $pembayaran->peminjaman->selesai }}</td>
        </tr>
        <tr>
            <th>Biaya</th>
            <td>{{ $pembayaran->peminjaman->biaya }}</td>
        </tr>
        <tr>
            <th>Tanggal Pembayaran</th>
            <td>{{ $pembayaran->tanggal }}</td>
        </tr>
        <tr>
            <th>Jumlah Pembayaran</th>
            <td>{{ $pembayaran->jumlah_bayar }}</td>
        </tr>
        <tr>
            <th>Nama Peminjam</th>
            <td>{{ $pembayaran->peminjaman->nama_peminjam }}</td>
        </tr>
        <tr>
            <th>No KTP Peminjam</th>
            <td>{{ $pembayaran->peminjaman->ktp_peminjam }}</td>
        </tr>
        <tr>
            <th>Status Pinjam</th>
            <td>{{ $pembayaran->peminjaman->status_pinjam }}</td>
        </tr>
        <tr>
            <th>Komentar Peminjam</th>
            <td>{{ $pembayaran->peminjaman->komentar_peminjam }}</td>
        </tr>
    </table>
    <div>
        <a href="{{ route('pembayaran.show') }}" class="btn btn-success mt-2">Kembali</a>
    </div>
</x-layout>
