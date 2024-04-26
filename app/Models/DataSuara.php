<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSuara extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function hasCalon()
    {
        return $this->belongsTo(CalonRt::class);
    }
}
