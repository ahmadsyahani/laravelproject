<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterContact extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function siswa() {
        return $this->belongsTo(MasterSiswa::class, 'siswa_id', 'id');
    }

    function contactType() {
        return $this->belongsTo(ContactType::class, 'contact_type_id', 'id');
    }
}
