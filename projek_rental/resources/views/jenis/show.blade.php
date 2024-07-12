<x-layout>
    <!-- Cara 2 - Kirimnya/Desainya Melalui View(untuk BlankPage & Card_Title): -->
    <x-slot name="title">Data Jenis Kendaraan</x-slot>
    <x-slot name="card_title">Daftar Jenis Kendaraan Aktif</x-slot>
    <h2 class="text-center">Data Jenis Kendaraan</h2>
    <a href="{{ route('jenis.create') }}"><button class="btn btn-primary"><i class="fas fa-plus">Tambah
                Data</i></button></a>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>description</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list_jenis as $jenis)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jenis->nama }}</td>
                <td>{{ $jenis->description}}</td>

                <td>
                    <form action="{{ route('jenis.destroy', $jenis->id) }}" method="post">
                        <a href="{{ route('jenis.view', $jenis->id) }}" class="btn btn-transparant"><i
                                class="fas fa-eye text-info"></i></a>
                        <a href="{{ route('jenis.edit', $jenis->id) }}" class="btn btn-transparant"><i
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
