<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Specify the table name if it's different from Laravel's convention
    protected $table = 'mahasiswa';

    // Specify the columns that are mass assignable
    protected $fillable = [
        'nim',
        'nama_lengkap',
        'jurusan',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'email',
        'alamat_tinggal',
        'foto',
    ];    
}
