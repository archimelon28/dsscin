<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPenilaian extends Model
{
    protected $table = 'tb_penilaian';
    protected $primaryKey = 'id_penilaian';
    public $timestamps = false;
}
