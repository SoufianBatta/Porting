<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Utenti extends Model
{
    protected $table = 'Utenti';
    protected $primaryKey = 'Email';
    protected $keyType = 'string';
    public $incrementing = false;

    public $timestamps = false;

    protected $attributes = array(
        'Avatar' => '\Images\Index\pokeball_retro.png'
    );
    public function Pokemons() : HasManyThrough {
        return $this->hasManyThrough(Pokemon::class, Incontro::class,'Utente','id','Email','PokemonID');
    }
}
