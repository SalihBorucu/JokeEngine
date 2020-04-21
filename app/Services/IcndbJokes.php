<?php

namespace App\Services;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class IcndbJokes
{
    const API_ENDPOINT = 'http://api.icndb.com/jokes/random';

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
            $joke = $result->value->joke;
        } catch (\Exception $e) {
            Log::emergency($e);
            return false;
        }
        return $joke ;
    }
}