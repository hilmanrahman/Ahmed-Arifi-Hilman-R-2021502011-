<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'siswa';
    protected $primaryKey       = 'id_siswa';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_siswa', 'nama_siswa', 'id_guru', 'gender', 'telp', 'address', 'kelas'];
}
