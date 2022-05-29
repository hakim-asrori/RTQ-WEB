<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasHalaqah extends Model
{
    use HasFactory;

    protected $table = "tb_kelas_halaqah";

    protected $guarded = [""];

    public $timestamps = false;
}
