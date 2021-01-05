<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function peserta()
    {
        return $this->belongsToMany(Anggota::class, 'user_event', 'id_event', 'id_anggota');
    }
}
