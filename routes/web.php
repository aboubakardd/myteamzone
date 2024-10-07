<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\EntraineurController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\ParenteController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PublicEventController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\DashboardController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


// Page d'accueil
Route::get('/index', [HomeController::class, 'index'])->name('home');

// Auth
Route::get('register', [RegisterController::class, 'showUserRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'registerUser']);
Route::get('register/parent', [RegisterController::class, 'showParentRegistrationForm'])->name('register.parent');
Route::post('register/parent', [RegisterController::class, 'registerParent']);

    Route::post('/logout', function () {
        auth()->logout();
        return redirect('/login'); // Redirection vers la page de connexion après déconnexion
    })->name('logout');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Dashboard 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('joueurs', JoueurController::class);
    Route::resource('entraineurs', EntraineurController::class);
    Route::resource('joueurs.statistiques', StatistiqueController::class);
    Route::resource('admin/events', EventController::class);
    Route::get('conversations', [ConversationController::class, 'index'])->name('conversations.index');
    Route::get('conversations/{id}', [ConversationController::class, 'show'])->name('conversations.show');
    Route::post('conversations', [ConversationController::class, 'store'])->name('conversations.store');
});


Route::get('/joueurs-public', [JoueurController::class, 'indexPublic'])->name('joueurs.public');


// Route::middleware(['role:admin'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//     Route::resource('joueurs', JoueurController::class);
//     Route::resource('entraineurs', EntraineurController::class);
//     Route::resource('joueurs.statistiques', StatistiqueController::class);
//     Route::resource('admin/events', EventController::class);
//     Route::get('conversations', [ConversationController::class, 'index'])->name('conversations.index');
//     Route::get('conversations/{id}', [ConversationController::class, 'show'])->name('conversations.show');
//     Route::post('conversations', [ConversationController::class, 'store'])->name('conversations.store');
// });

Route::post('/profile/update-picture', [ProfileController::class, 'updatePicture'])->name('profile.updatePicture');


// Routes pour les statistiques des parents
Route::get('/parentes/statistiques/{joueur_id}', [ParenteController::class, 'showStats'])->name('parentes.stats');

// Routes pour les événements publics
Route::get('/events', [PublicEventController::class, 'index'])->name('public.events.index');
Route::get('/events/{id}', [PublicEventController::class, 'show'])->name('public.events.show');

// Routes pour l'API
Route::middleware('auth:sanctum')->get('/api/events', [PublicEventController::class, 'getAllEvents'])->name('api.events.index');
Route::middleware('auth:sanctum')->get('/api/next-event', [PublicEventController::class, 'getNextEvent'])->name('api.next-event');

Route::get('/api/upcoming-events', [PublicEventController::class, 'getAllUpcomingEvents'])->name('api.upcoming-events');


// Routes pour la boutique
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{product}', [ShopController::class, 'show'])->name('shop.show');

// Routes pour le panier
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::middleware('auth:sanctum')->group(function () {
// Routes pour les commandes
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');
Route::get('/order/confirmation/{orderId}', [OrderController::class, 'confirmation'])->name('order.confirmation');
Route::post('/order/{orderId}/cancel', [OrderController::class, 'cancelOrder'])->name('order.cancel');
Route::post('/order/cancel/{orderId}', [OrderController::class, 'cancelOrder'])->name('order.cancel');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

});


Route::middleware('auth:sanctum')->group(function () {
// Route pour afficher le formulaire de paiement
Route::get('/cart.checkout', function () {
    return view('cart.checkout');
})->name('checkout');

});


Route::middleware('auth:sanctum')->group(function () {
// Route pour afficher le formulaire de paiement
Route::get('/checkout', function () {
    return view('cart.checkout');
})->name('payment.form');

});



Route::middleware('auth:sanctum')->group(function () {
// Route pour le traitement du paiement
Route::post('/stripe-payment', [PaymentController::class, 'handlePayment'])->name('stripe.payment');

// Route de test Stripe (à supprimer ou à conserver selon besoin)
Route::get('/test-stripe', function () {
    return view('cart.stripe');
});

});

// Routes pour les actualités
Route::get('/latest-news', [NewsController::class, 'index'])->name('latest-news.index');

require __DIR__.'/auth.php';
