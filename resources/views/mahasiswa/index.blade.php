<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Data Mahasiswa</h2>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Add Button -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-success">+ Tambah</a>
        </div>

        <!-- Data Table -->
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Jurusan</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>No HP</th>
                    <th>Email</th>
                    <th>Alamat Tinggal</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->nim }}</td>
                    <td>{{ $data->nama_lengkap }}</td>
                    <td>{{ $data->jurusan }}</td>
                    <td>{{ $data->tempat_lahir }}</td>
                    <td>{{ $data->tanggal_lahir }}</td>
                    <td>{{ $data->no_hp }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->alamat_tinggal }}</td>
                    <td>
                        @if ($data->foto)
                            <img src="{{ asset('storage/' . $data->foto) }}" alt="Foto Mahasiswa" width="50">
                        @else
                            Tidak Ada Foto
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('mahasiswa.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $data->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
