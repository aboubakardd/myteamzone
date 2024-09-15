<header>
    <!-- Code HTML pour le header -->
     <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ht-info">
                        <ul>
                @if (Route::has('login'))
                    @auth
                        @role('admin') <!-- Lien pour l'admin seulement -->
                            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @endrole 
                        <!-- Lien de profil -->
                        <li><a href="{{ route('profile.edit') }}">Profil</a></li>
                         <!-- Lien de déconnexion -->
                         <li>
    <a href="{{ route('logout') }}" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
</li>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

                    @else
                        <li><a href="{{ route('login') }}">Sign in</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li><a href="{{ route('register.parent') }}">Inscription Parent</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ht-links">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-vimeo"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <img src="img/logo.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <ul class="main-menu">
                                <li class="active"><a href="./index">Home</a></li>
                                <li><a href="./contact.html">Contact Us</a></li>

                            @if (Route::has('login'))
                                @auth
                                    <li><a href="{{ route('public.events.index') }}">Événements</a></li>
                                    <li><a href="{{ route('conversations.index') }}">Conversations</a></li>
                                    <li class="nav-item">
                                            <a class="nav-link" href="{{ route('shop.index') }}">Boutique</a> <!-- Lien vers la boutique -->
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('cart.index') }}">
                                            Panier
                                            @if (Cart::getTotalQuantity() > 0)
                                                <span class="badge badge-pill badge-primary">{{ Cart::getTotalQuantity() }}</span>
                                            @endif
                                        </a>
                                    </li>
                                    <li><a href="{{ route('orders.index') }}">Mes commandes</a></li>


                                    @php
                                        $enfants = auth()->user()->enfants;
                                    @endphp
                                    @if($enfants->isEmpty())
                                        <li>Aucun enfant trouvé</li>
                                    @else
                                        @foreach ($enfants as $enfant)
                                            <li><a href="{{ route('parentes.stats', $enfant->id) }}">Statistiques de {{ $enfant->name }}</a></li>
                                        @endforeach
                                    @endif
                                @endauth
                            @endif


                            <!-- Ajout du lien vers les Conversations -->
                           
                    
                            </ul>
                            <div class="nm-right search-switch">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas-open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
</header>