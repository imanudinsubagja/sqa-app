<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Edit Data Mahasiswa</h2>

        <!-- Form -->
        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim }}" required>
            </div>

            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $mahasiswa->nama_lengkap }}" required>
            </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $mahasiswa->jurusan }}" required>
            </div>

            <div class="mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $mahasiswa->tempat_lahir }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $mahasiswa->tanggal_lahir }}" required>
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $mahasiswa->no_hp }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $mahasiswa->email }}" required>
            </div>

            <div class="mb-3">
                <label for="alamat_tinggal" class="form-label">Alamat Tinggal</label>
                <textarea class="form-control" id="alamat_tinggal" name="alamat_tinggal" rows="3" required>{{ $mahasiswa->alamat_tinggal }}</textarea>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                @if ($mahasiswa->foto)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $mahasiswa->foto) }}" alt="Foto Mahasiswa" width="100">
                    </div>
                @endif
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
