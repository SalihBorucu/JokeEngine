<?php

namespace App\Services;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class OfficialApiJokes
{
    const API_ENDPOINT = 'https://official-joke-api.appspot.com/random_joke';

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
            $result ="Question: ".$result->setup."\n Answer: ".$result->punchline;
        } catch (\Exception $e) {
            Log::emergency($e);
            return false;
        }
        return $result;
    }
}