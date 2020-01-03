<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelUser extends Model
{
    protected $table = 'tb_pengguna';
    protected $primaryKey = 'id_pengguna';
    public $timestamps = false;
}
