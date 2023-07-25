<?php

namespace App\Http\Controllers;

use App\Models\Utenti;
use CURLFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class HomePageController extends Controller
{
    public function ViewHomePage(){
        if (!Session::has('email')) {
            return redirect('/');
        }
        $User = Utenti::where('email', '=', Session::get('email'))->first();
        return view('Homepage',['Utente' => $User]);
    }
    public function Logout(){
        Session::flush();
        return redirect('/');
    }

    public function ChangeAvatar(Request $request){
        if (!Session::has('email')) {
            return redirect('/');
        }
        if ($request->hasFile('Propic') && $request->file('Propic')->isValid()) {
            // get Illuminate\Http\UploadedFile instance
            $image = $request->file('Propic');
            $file = new CURLFile($image->getPathname(),$image->getMimeType());
            // // // post request with attachment
            $data = array("key" => '00043a2397fe5ab26485d1cdbb1c122d', "media" => $file);
            $file_curl = curl_init();
            curl_setopt($file_curl, CURLOPT_URL, "https://thumbsnap.com/api/upload");
            curl_setopt($file_curl, CURLOPT_POST, 1);
            curl_setopt($file_curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($file_curl, CURLOPT_RETURNTRANSFER, 1);
            $response = json_decode(curl_exec($file_curl),true);
            curl_close($file_curl);
            $new_avatar = $response['data']['media'];
            if(Utenti::where('Email', Session::get('email'))->update(['Avatar' => $new_avatar])){
                return ['Avatar'=> 'Cambiato'];
            }
            else{
                return ['Avatar'=> 'Non Cambiato'];
            }
        } else {
            return ['File' => 'Non Trovato'];
        }
    }
    
}
