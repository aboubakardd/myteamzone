<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class PublicEventController extends Controller
{
    // Afficher tous les événements dans une vue
    public function index()
    {
        $events = Event::orderBy('start_time', 'asc')->get();
        return view('public.events.index', compact('events'));
    }

    // Récupérer tous les événements via l'API
    public function getAllEvents()
    {
        $events = Event::orderBy('start_time', 'asc')->get();
        return response()->json($events);
    }

    // Récupérer le prochain événement via l'API
    public function getNextEvent()
    {
        $nextEvent = Event::where('start_time', '>', now())
                          ->orderBy('start_time', 'asc')
                          ->first();

        if ($nextEvent) {
            return response()->json($nextEvent);
        } else {
            return response()->json(['message' => 'Aucun événement à venir'], 404);
        }
    }


    public function getAllUpcomingEvents()
{
    $upcomingEvents = Event::where('start_time', '>', now())
                           ->orderBy('start_time', 'asc')
                           ->get();

    return response()->json($upcomingEvents);
}


    // Afficher les détails d'un événement dans une vue
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('public.events.show', compact('event'));
    }
}

