<?php

namespace App\Models;

use CodeIgniter\Model;

class SampahModel extends Model
{
    protected $table = "sampah";
    protected $primaryKey = "id_wilayah";
    protected $returnType = "array";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_wilayah', 'nama_wilayah', 'jenis_sampah', 'berat', 'tinggi'];
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
