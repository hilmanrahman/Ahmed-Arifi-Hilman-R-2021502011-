<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'alumni';
    protected $primaryKey       = 'id_alumni';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_alumni', 'nama', 'gender', 'telp', 'address', 'lulus'];
}
