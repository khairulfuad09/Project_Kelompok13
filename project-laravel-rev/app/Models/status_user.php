<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status_user extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_status',
        'nama_status',
    ];
}
