<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Harga extends Model
{
    use HasFactory; use HasUlids;

    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function kec()
    {
        return $this->belongsTo(Kecamatan::class, "kecamatan", "kode");
    }
}
