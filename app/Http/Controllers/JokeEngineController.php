<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JokeEngineController extends Controller
{
    public function show( Request $request){
        $jokeAmount = $request->jokeAmount;
        $generators = ['App\Services\DadJokes',
                        'App\Services\IcndbJokes', 
                        'App\Services\OfficialApiJokes', 
                        'App\Services\Sv443Jokes'];

        $jokeArray = [];
            for ($i=0; $i < $jokeAmount; $i++) { 
                        array_push($jokeArray, html_entity_decode((new $generators[array_rand($generators)])->getRandomJoke()));
                    };
        return view('welcome')->with([
            "jokeArray" => $jokeArray]);
    }
}

