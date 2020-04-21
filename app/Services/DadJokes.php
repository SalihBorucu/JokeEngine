<?php

namespace App\Services;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class DadJokes
{
    const API_ENDPOINT = 'https://icanhazdadjoke.com/';

    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }
    
    public function getRandomJoke()
    {
        try{
            $response = $this->client->request('GET', self::API_ENDPOINT, [
                'headers' => ['Accept' => 'application/json'],
            ]);
            $result = json_decode($response->getBody()->getContents());
            $joke = $result->joke;
        } catch (\Exception $e) {
            Log::emergency($e);
            return false;
        }
        return $joke;
    }
}

