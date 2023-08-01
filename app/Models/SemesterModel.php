<?php

namespace App\Models;

use CodeIgniter\Model;

class SemesterModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'guru';
    protected $primaryKey       = 'id_guru';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_guru', 'nama', 'gender', 'telp', 'address', 'status'];
}
