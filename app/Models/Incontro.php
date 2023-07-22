<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incontro extends Model
{
    use HasFactory;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $table = 'incontro';

    public $timestamps = false;
    protected $attributes = [
        'Catturato' => false,
    ];
}
