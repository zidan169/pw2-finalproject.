<x-layout>
    <!-- Cara 2 - Kirimnya/Desainya Melalui View(untuk BlankPage & Card_Title): -->
    <x-slot name="title">Data Peminjaman</x-slot>
    <x-slot name="card_title">Daftar Peminjaman Aktif</x-slot>
    <x-slot name="card_footer"></x-slot>

    <h2 class="text-center">Data Peminjaman</h2>
    <a href="{{ route('peminjaman.create') }}"><button class="btn btn-primary"><i class="fas fa-plus">Tambah
                Data</i></button></a>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjaman</th>
                <th>KTP Peminjam</th>
                <th>Keperluan</th>
                <th>Tgl Mulai</th>
                <th>Tgl Selesai</th>
                <th>Biaya</th>
                <th>Komentar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list_peminjaman as $peminjaman)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ strtoupper($peminjaman->nama_peminjam) }}</td>
                <td>{{ $peminjaman->ktp_peminjam }}</td>
                <td>{{ $peminjaman->keperluan_pinjam }}</td>
                <td>{{ $peminjaman->mulai }}</td>
                <td>{{ $peminjaman->selesai }}</td>
                <td>{{ $peminjaman->biaya }}</td>
                <td>{{ $peminjaman->komentar_peminjam }}</td>
                <td>{{ $peminjaman->pembayaran ? $peminjaman->status_pinjam : $peminjaman->status_pinjam.' (Belum
                    dibayar)' }}</td>
                <td>
                    <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="post">
                        <a href="{{ route('peminjaman.view', $peminjaman->id) }}" class="btn btn-transparant"><i
                                class="fas fa-eye text-info"></i></a>
                        <a href="{{ route('peminjaman.edit', $peminjaman->id) }}" class="btn btn-transparant"><i
                                class="fas fa-edit text-warning"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-transparant"><i
                                class="fas fa-trash text-danger"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
