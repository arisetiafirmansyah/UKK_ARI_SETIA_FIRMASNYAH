<?php

namespace App\Models; // Deklarasi namespace harus berada di baris pertama

use CodeIgniter\Model;

class Teacher_model extends Model
{
    protected $table = 'peminjam'; // Ganti 'teachers' dengan nama tabel guru Anda
    protected $primaryKey = 'id_peminjam'; // Ganti 'id' dengan nama primary key pada tabel guru

    public function getTeacherCount()
    {
        return $this->countAll();
    }

    
}
