@extends('layout')

@section('title', 'Accueil')

@section('content')
    <!-- Copiez le contenu de body de index.html ici -->
        <!-- Hero Section Begin -->
        <section class="hero-section set-bg" data-setbg="img/hero/hero-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hs-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="hs-text">
                                          <!-- Prochain événement sera affiché ici -->
                                    <div id="next-event">
                                        <p>Chargement du prochain événement...</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->


    <script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/api/next-event')
            .then(response => response.json())
            .then(data => {
                const eventContainer = document.getElementById('next-event');
                if (data.message) {
                    eventContainer.innerHTML = `<p>${data.message}</p>`;
                } else {
                    eventContainer.innerHTML = `
                        <h2>${data.title}</h2>
                        <p>${data.description}</p>
                        <p><strong>Date :</strong> ${new Date(data.start_time).toLocaleString()}</p>
                        <p><strong>Lieu :</strong> ${data.location}</p>
                    `;
                }
            })
            .catch(error => {
                document.getElementById('next-event').innerHTML = `<p>Erreur lors de la récupération de l'événement</p>`;
            });
    });
</script>

    <!-- Trending News Section Begin -->
    <div class="trending-news-section">
        <div class="container">
            <div class="tn-title"><i class="fa fa-caret-right"></i> Tendances</div>
            <div class="news-slider owl-carousel">
                <div class="nt-item">Nouvelle recrue pour l'équipe</div>
                <div class="nt-item">Prochain match crucial contre Anderlecht</div>
            </div>
        </div>
    </div>
    <!-- Trending News Section End -->

    <!-- Match Section Begin -->
    <section class="match-section set-bg" data-setbg="img/match/match-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ms-content">
                        <h4>Prochaines Matchs</h4>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            
                                            <h6>Royal Fc</h6>
                                        </td>
                                        <td class="mt-content">
                                            <h4>VS</h4>
                                            <div class="mc-op">15 September 2019</div>
                                        </td>
                                        <td class="right-team">
                                            
                                            <h6>Anderlecht</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                    <td class="left-team">
                                        
                                        <h6>Ixelles</h6>
                                    </td>
                                    <td class="mt-content">
                                        <h4>VS</h4>
                                        <div class="mc-op">20 Août 2024</div>
                                    </td>
                                    <td class="right-team">
                                        
                                        <h6>Royal Fc</h6>
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            
                                            <h6>Royal Fc</h6>
                                        </td>
                                        <td class="mt-content">
                                            
                                            <h4>VS</h4>
                                            <div class="mc-op">15 September 2019</div>
                                        </td>
                                        <td class="right-team">
                                            
                                            <h6>Molembeek</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ms-content">
                        <h4>Resultats recentes</h4>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                           
                                            <h6>Royal Fc</h6>
                                        </td>
                                        <td class="mt-content">
                                            
                                            <h4>1 : 2</h4>
                                            <div class="mc-op">15 September 2019</div>
                                        </td>
                                        <td class="right-team">
                                            
                                            <h6>Berchem</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            
                                            <h6>Bruges</h6>
                                        </td>
                                        <td class="mt-content">
                                           
                                            <h4>1 : 2</h4>
                                            <div class="mc-op">15 September 2019</div>
                                        </td>
                                        <td class="right-team">
                                            
                                            <h6>Royal Fc</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                    <td class="left-team">
                                        
                                        <h6>As Monaco</h6>
                                    </td>
                                    <td class="mt-content">
                                        
                                        <h4>2 : 1</h4>
                                        <div class="mc-op">15 Août 2024</div>
                                    </td>
                                    <td class="right-team">
                                        
                                        <h6>Royal Fc</h6>
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Match Section End -->

    <!-- Galerie du Club Section Begin -->
<!-- Carousel Section Begin -->
<section class="carousel-section">
    <div id="soccerCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#soccerCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#soccerCarousel" data-slide-to="1"></li>
            <li data-target="#soccerCarousel" data-slide-to="2"></li>
            <li data-target="#soccerCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Carousel items -->
        <div class="carousel-inner">
            <!-- First slide -->
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/soccer/soccer-1.jpg" alt="Victoire contre les Rivaux Historiques">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Victoire contre les Rivaux Historiques</h5>
                    <p>20 Août 2024</p>
                </div>
            </div>
            <!-- Second slide -->
            <div class="carousel-item">
                <img class="d-block w-100" src="img/soccer/soccer-3.jpg" alt="Séance d'Entraînement Intense">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Séance d'Entraînement Intense</h5>
                    <p>18 Août 2024</p>
                </div>
            </div>
            <!-- Third slide -->
            <div class="carousel-item">
                <img class="d-block w-100" src="img/soccer/soccer-3.jpg" alt="L'Ambiance des Supporters lors du Derby">
                <div class="carousel-caption d-none d-md-block">
                    <h5>L'Ambiance des Supporters lors du Derby</h5>
                    <p>15 Août 2024</p>
                </div>
            </div>
            <!-- Fourth slide -->
            <div class="carousel-item">
                <img class="d-block w-100" src="img/soccer/soccer-3.jpg" alt="Journée Portes Ouvertes du Club">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Journée Portes Ouvertes du Club</h5>
                    <p>10 Août 2024</p>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="carousel-control-prev" href="#soccerCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
        </a>
        <a class="carousel-control-next" href="#soccerCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div>
</section>
<!-- Carousel Section End -->

<!-- Galerie du Club Section End -->

<section class="latest-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title latest-title">
                    <h3>Latest <span>News</span></h3>
                    <ul>
                        <li>All</li>
                        <li>League Belge</li>
                        <li>Championnats</li>
                    </ul>
                </div>
                <!-- <div class="row">
                 @isset($latestNews['articles'])
                    @foreach($latestNews['articles'] as $news)
                    <div class="col-md-6">
                        <div class="news-item left-news">
                            <div class="ni-pic set-bg" style="background-image: url('{{ $news['urlToImage'] }}');">
                                <div class="ni-tag">{{ $news['source']['name'] }}</div>
                            </div>
                            <div class="ni-text">
                                <h4><a href="{{ $news['url'] }}" target="_blank">{{ $news['title'] }}</a></h4>
                                <ul>
                                    <li><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($news['publishedAt'])->format('M d, Y') }}</li>
                                    <li><i class="fa fa-edit"></i> {{ $news['author'] ?? 'Unknown' }}</li>
                                </ul>
                                <p>{{ $news['description'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p>Aucune actualité disponible pour le moment.</p>
                    @endisset
                </div> -->
                PARTIE ACTU FOOT AVEC API OU FLUX RSS
            </div>
            <div class="col-lg-4">
                <div class="section-title">
                    <h3>Club <span>Ranking</span></h3>
                </div>
                <div class="points-table">
                    <table>
                        <thead>
                            <tr>
                                <th class="th-o"></th>
                                <th>Classement</th>
                                <th class="th-o">P</th>
                                <th class="th-o">W</th>
                                <th class="th-o">L</th>
                                <th class="th-o">PTS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Add your ranking data here -->
                            <tr>    <!-- Example row -->
                                <td>1</td>
                                <td>Royal Fc</td>
                                <td>3</td>
                                <td>3</td>
                                <td>0</td>
                                <td>9</td>
                            </tr>
                            <tr>    
                                <td>2</td>
                                <td>Anderlecht</td>
                                <td>3</td>
                                <td>2</td>
                                <td>1</td>
                                <td>6</td>
                            </tr>
                            <tr>    
                                <td>3</td>
                                <td>Charleroi</td>
                                <td>3</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                            </tr>
                            <tr>    
                                <td>4</td>
                                <td>Union saint gilloise</td>
                                <td>3</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                            </tr>
                            <tr>    
                                <td>5</td>
                                <td>Ixelles</td>
                                <td>3</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                            </tr>
                            <!-- <tr>    
                                <td>6</td>
                                <td>Molembeek</td>
                                <td>3</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                            </tr> -->
                        </tbody>
                    </table>
                    <a href="#" class="p-all">View All</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Section End -->

    <!-- Video Section Begin -->
    <section class="video-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Hot <span>Videos</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="video-slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="video-item set-bg" data-setbg="img/videos/video-1.jpg">
                            <div class="vi-title">
                                
                            </div>
                            <a href="https://www.youtube.com/watch?v=8DshMndRnvI" class="play-btn video-popup"><img
                                    src="img/videos/play.png" alt=""></a>
                            <div class="vi-time">11:13</div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="video-item set-bg" data-setbg="img/videos/video-2.jpg">
                            <div class="vi-title">
                                <h5>Academy - Passing & Receiving Football Training Practice</h5>
                            </div>
                            <a href="https://www.youtube.com/watch?v=1-jsz-rOqYs" class="play-btn video-popup"><img
                                    src="img/videos/play.png" alt=""></a>
                            <div class="vi-time">11:13</div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="video-item set-bg" data-setbg="img/videos/video-3.jpg">
                            <div class="vi-title">
                                <h5>Des exercices tactiques en football</h5>
                            </div>
                            <a href="https://www.youtube.com/watch?v=BBG_P_RSLNs" class="play-btn video-popup"><img
                                    src="img/videos/play.png" alt=""></a>
                            <div class="vi-time">11:13</div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="video-item set-bg" data-setbg="img/videos/video-4.jpg">
                            <div class="vi-title">
                                <h5>Match de foot</h5>
                            </div>
                            <a href="https://www.youtube.com/watch?v=mzPfb4cShUc" class="play-btn video-popup"><img
                                    src="img/videos/play.png" alt=""></a>
                            <div class="vi-time">11:13</div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="video-item set-bg" data-setbg="img/videos/video-4.jpg">
                            <div class="vi-title">
                                <h5>What If They Let You Run The Hubble</h5>
                            </div>
                            <a href="https://www.youtube.com/watch?v=dhYOPzcsbGM" class="play-btn video-popup"><img
                                    src="img/videos/play.png" alt=""></a>
                            <div class="vi-time">11:13</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video Section End -->

   @endsection
