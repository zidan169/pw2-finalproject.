<x-layout>
    <!-- Cara 2 - Kirimnya/Desainya Melalui View(untuk BlankPage & Card_Title): -->
    <x-slot name="title">Data Mobil</x-slot>
    <x-slot name="card_title">Daftar Mobil Aktif</x-slot>
    <h2 class="text-center">Data Mobil</h2>
    <a href="{{ route('armada.create') }}"><button class="btn btn-primary"><i class="fas fa-plus">Tambah
                Data</i></button></a>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Merk</th>
                <th>Plat Nomor</th>
                <th>Tahun Beli</th>
                <th>Deskripsi</th>
                <th>Kapasitas Kursi</th>
                <th>Rating</th>
                <th>Jenis Kendaraan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list_armada as $armada)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $armada->merk }}</td>
                <td>{{ $armada->nopol }}</td>
                <td>{{ $armada->thn_beli }}</td>
                <td>{{ $armada->deskripsi }}</td>
                <td>{{ $armada->kapasitas_kursi }}</td>
                <td>{{ $armada->rating }}</td>
                <td>{{ $armada->jenis_kendaraan->nama }}</td>
                <td>
                    <form action="{{ route('armada.destroy', $armada->id) }}" method="post">
                        <a href="{{ route('armada.view', $armada->id) }}" class="btn btn-transparant"><i
                                class="fas fa-eye text-info"></i></a>
                        <a href="{{ route('armada.edit', $armada->id) }}" class="btn btn-transparant"><i
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
