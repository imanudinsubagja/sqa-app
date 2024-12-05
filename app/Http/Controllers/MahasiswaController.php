<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all(); // Fetch all Mahasiswa records
    return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the input
    $request->validate([
        'nim' => 'required|unique:mahasiswa|max:10',
        'nama_lengkap' => 'required|string|max:255',
        'jurusan' => 'required|string|max:255',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'no_hp' => 'required|string|max:15',
        'email' => 'required|email|unique:mahasiswa|max:255',
        'alamat_tinggal' => 'required|string',
        'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    // Handle file upload
    $fotoPath = null;
    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('uploads', 'public');
    }

    // Save the data
    Mahasiswa::create([
        'nim' => $request->nim,
        'nama_lengkap' => $request->nama_lengkap,
        'jurusan' => $request->jurusan,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'no_hp' => $request->no_hp,
        'email' => $request->email,
        'alamat_tinggal' => $request->alamat_tinggal,
        'foto' => $fotoPath,
    ]);

    // Redirect back to the index page with a success message
    return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil ditambahkan');
}


    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    $mahasiswa = Mahasiswa::findOrFail($id);
    return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'nim' => 'required|max:10|unique:mahasiswa,nim,' . $id,
        'nama_lengkap' => 'required|string|max:255',
        'jurusan' => 'required|string|max:255',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'no_hp' => 'required|string|max:15',
        'email' => 'required|email|max:255|unique:mahasiswa,email,' . $id,
        'alamat_tinggal' => 'required|string',
        'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $mahasiswa = Mahasiswa::findOrFail($id);

    // Handle file upload
    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('uploads', 'public');
        $mahasiswa->foto = $fotoPath;
    }

    // Update data
    $mahasiswa->update([
        'nim' => $request->nim,
        'nama_lengkap' => $request->nama_lengkap,
        'jurusan' => $request->jurusan,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'no_hp' => $request->no_hp,
        'email' => $request->email,
        'alamat_tinggal' => $request->alamat_tinggal,
    ]);

    return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
{
    // Delete the Mahasiswa record
    $mahasiswa->delete();

    // Redirect back with a success message
    return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus');
}
}
