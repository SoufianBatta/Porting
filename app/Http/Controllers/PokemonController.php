<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PokemonController extends Controller
{
    //
    public function ViewPokebattle(){
        return view('PokeBattle');
    }
    public function GetPokemon( $pokemonp) {
        $response = Http::get("https://pokeapi.co/api/v2/pokemon/$pokemonp");
        if ($response->status() == 200) {
            $pokemon['id'] = $response['id'];
            $pokemon['Name'] = $response['name'];
            $pokemon['Height'] = $response['height'];
            $pokemon['Weight'] = $response['weight'];
            $pokemon['Type1'] = $response['types'][0]['type']['name'];
            $pokemon['Type2'] = null;
            if (isset($response['types'][1])) {
                $pokemon['Type2'] = $response['types'][1]['type']['name'];
            }
            $pokemon['Hp'] = $response['stats'][0]['base_stat'];
            $pokemon['Attack'] = $response['stats'][1]['base_stat'];
            $pokemon['Defense'] = $response['stats'][2]['base_stat'];
            $pokemon['SpecialAttack'] = $response['stats'][3]['base_stat'];
            $pokemon['SpecialDefense'] = $response['stats'][4]['base_stat'];
            $pokemon['Speed'] = $response['stats'][5]['base_stat'];
            if (isset($response['sprites']['versions']['generation-v']['black-white']['animated']['front_default'])) {
                $pokemon['img'] = $response['sprites']['versions']['generation-v']['black-white']['animated']['front_default'];
            }
            else{
                $pokemon['img'] = $response['sprites']['front_default'];
            }
            if(!Pokemon::where('id', $pokemon['id'])->exists()){
            Pokemon::unguard();
            Pokemon::create($pokemon);
            Pokemon::reguard();
            }
            return ['Pokemon' => $pokemon, 'Token' => csrf_token()];
        }
        else{
            return ['NotFound' => true];
        }
    }
    public function RegistraIncontro(Request $request){
        $incontro = [
            'PokemonID' => $request['Pokemon'],
            'Catturato' => false,
            'Utente' => Session::get('email')
        ];
        if (!DB::table('incontro')->where('Utente', $incontro['Utente'])->where('PokemonID', $incontro['PokemonID'])->exists()) {
            DB::table('incontro')->insert($incontro);
        }
        return ['Incontro' => $incontro, 'Token' => csrf_token()]; 
    }
    public function CatturaPokemon(Request $request){
        return DB::table('incontro')->where('Utente', Session::get('email'))->where('PokemonID', $request['Pokemon'])->update(['Catturato' => true]);
    }
}
