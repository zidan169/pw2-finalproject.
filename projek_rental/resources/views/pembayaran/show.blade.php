<x-layout>
    <!-- Cara 2 - Kirimnya/Desainya Melalui View(untuk BlankPage & Card_Title): -->
    <x-slot name="title">Data Pembayaran</x-slot>
    <x-slot name="card_title">Daftar Pembayaran</x-slot>
    <h2 class="text-center">Data Pembayaran</h2>
    <a href="{{ route('pembayaran.create') }}"><button class="btn btn-primary"><i class="fas fa-plus">Tambah
                Data</i></button></a>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pembayaran</th>
                <th>Jumlah Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list_pembayaran as $pembayaran)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pembayaran->peminjaman->nama_peminjam }}</td>
                <td>{{ $pembayaran->tanggal }}</td>
                <td>{{ $pembayaran->jumlah_bayar }}</td>
                <td>
                    <form action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="post">
                        <a href="{{ route('pembayaran.view', $pembayaran->id) }}" class="btn btn-transparant"><i
                                class="fas fa-eye text-info"></i></a>
                        <a href="{{ route('pembayaran.edit', $pembayaran->id) }}" class="btn btn-transparant"><i
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
