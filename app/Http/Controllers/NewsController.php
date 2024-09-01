<?php

// app/Services/NewsService.php

namespace App\Services;

use GuzzleHttp\Client;
use App\Http\Controllers\HomeController;

class NewsService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('NEWS_API_KEY'); // Assurez-vous que la clé API est dans votre fichier .env
    }

    public function getLatestNews()
    {
        $response = $this->client->get('http://api.mediastack.com/v1/news', [
            'query' => [
                'access_key' => env('MEDIASTACK_API_KEY'),
                'countries' => 'be', // Code ISO 3166-1 pour le pays
                'categories' => 'sports',
                'languages' => 'fr',
                'limit' => 10,
            ]
        ]);
    
        return json_decode($response->getBody()->getContents(), true);
    }
        
}
