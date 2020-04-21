<?php

namespace App\Services;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class Sv443Jokes
{
    const API_ENDPOINT = 'https://sv443.net/jokeapi/v2/joke/Any?type=single';

    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }
    
    public function getRandomJoke()
    {
        try{
            $response = $this->client->get(self::API_ENDPOINT);
            $result = json_decode($response->getBody()->getContents());
            $joke= $result->joke;
        } catch (\Exception $e) {
            Log::emergency($e);
            return false;
        }
        return $joke;
    }
}