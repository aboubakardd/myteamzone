<?php
// app/Services/NewsService.php

namespace App\Services;

use GuzzleHttp\Client;

class NewsService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('NEWS_API_KEY'); // Assurez-vous que la clé API est dans votre fichier .env
    }

    public function getLatestNews($category = 'sports', $country = 'be')
    {
        $response = $this->client->get('https://newsapi.org/v2/top-headlines', [
            'query' => [
                'apiKey' => $this->apiKey,
                'category' => $category,
                'country' => $country
            ]
        ]);
    
            
    
        return json_decode($response->getBody()->getContents(), true); 
    }
    

}

