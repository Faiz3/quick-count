<?php

namespace App\Models;

use App\Models\DataSuara;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CalonRt extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function pemilih()
    {
        return $this->hasMany(DaftarPemilih::class);
    }

    public function haveDataSuara()
    {
        return $this->hasMany(DataSuara::class);
    }
}
