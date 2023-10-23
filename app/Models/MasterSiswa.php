<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSiswa extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'about', 'photo'];

    public function project()
    {
        return $this->hasMany(MasterProject::class, 'siswa_id', 'id');
    }

    function contact() {
        return $this->hasMany(MasterContact::class, 'siswa_id', 'id');
    }
}
