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
                <li>20:00 - May 19, 2019</li>
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Sign in</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li><a href="{{ route('register.parent') }}">Inscription Parent</a></li>
                        @endif
                    @endauth
                @endif
                <li><a href="#">Contact</a></li>
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
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <ul class="main-menu">
                                <li class="active"><a href="./index.html">Home</a></li>
                                <li><a href="./club.html">Club</a></li>
                                <li><a href="./schedule.html">Schedule</a></li>
                                <li><a href="./result.html">Results</a></li>
                                <li><a href="#">Sport</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="./blog.html">Blog</a></li>
                                        <li><a href="./blog-details.html">Blog Details</a></li>
                                        <li><a href="#">Schedule</a></li>
                                        <li><a href="#">Results</a></li>
                                    </ul>
                                </li>
                                <li><a href="./contact.html">Contact Us</a></li>

                                @if (Route::has('login'))
    @auth
        <li><a href="{{ route('public.events.index') }}">Événements</a></li>
        
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