<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utenti extends Model
{
    protected $table = 'Utenti';
    protected $primaryKey = 'Email';
    protected $keyType = 'string';
    public $incrementing = false;

    public $timestamps = false;
}
