<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelKampus extends Model
{
    protected $table = 'tb_kampus';
    protected $primaryKey = 'id_kampus';
    public $timestamps = false;
}
