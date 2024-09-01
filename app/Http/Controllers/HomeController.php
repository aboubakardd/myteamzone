<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Services\NewsService;

class HomeController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index()
    {
        $latestNews = $this->newsService->getLatestNews('general', 'us'); // Exemples de tests
    
        return view('index', compact('latestNews'));
    }
    
}
