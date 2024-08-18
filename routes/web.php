<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\EntraineurController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\ParenteController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PublicEventController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;


// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Auth
Route::get('register', [RegisterController::class, 'showUserRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'registerUser']);
Route::get('register/parent', [RegisterController::class, 'showParentRegistrationForm'])->name('register.parent');
Route::post('register/parent', [RegisterController::class, 'registerParent']);

// Dashboard et profil
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes pour les ressources
Route::middleware(['auth'])->group(function () {
    Route::resource('joueurs', JoueurController::class);
    Route::resource('entraineurs', EntraineurController::class);
    Route::resource('joueurs.statistiques', StatistiqueController::class);

    Route::resource('admin/events', EventController::class);
});



// Route pour les statistiques des parents
Route::get('/parentes/statistiques/{joueur_id}', [ParenteController::class, 'showStats'])->name('parentes.stats');

// Route pour la page index
Route::get('/index', function () {
    return view('index');
});


Route::get('/events', [PublicEventController::class, 'index'])->name('public.events.index');
Route::get('/events/{id}', [PublicEventController::class, 'show'])->name('public.events.show');


//Boutique
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{product}', [ShopController::class, 'show'])->name('shop.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');

// Route pour afficher le formulaire de paiement
Route::get('/checkout', function () {
    return view('cart.checkout');
})->name('payment.form');

// Route pour le traitement du paiement
Route::post('/stripe-payment', [PaymentController::class, 'handlePayment'])->name('stripe.payment');


Route::get('/test-stripe', function () {
    return view('cart.stripe');
});


require __DIR__.'/auth.php';
