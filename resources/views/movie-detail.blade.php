@extends('layouts.master')
@section('title', $movie['Title'])
@section('content')

<!-- Single Video Start -->
<section class="gen-section-padding-3 gen-single-video">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="gen-video-holder">
                            <!-- Menampilkan Poster Gambar -->
                            <img height="50px" src="{{ $movie['Poster'] !== 'N/A' ? $movie['Poster'] : asset('assets/image_not_found.png') }}" alt="Movie Poster">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-video">
                            <div class="gen-single-video-info">
                                <h2 class="gen-title">{{ $movie['Title'] }}</h2>
                                <div class="gen-single-meta-holder">
                                    <ul>
                                        <li>{{ $movie['Year'] }} </li>
                                        <li>
                                            <a href="#"><span>{{ $movie['Genre'] }}</span></a>
                                        </li>
                                        <li>
                                            <span>
                                                @php
                                                    $rating = floatval($movie['imdbRating']);
                                                    $fullStars = floor($rating / 2); 
                                                    $halfStar = ($rating / 2) - $fullStars >= 0.5;
                                                @endphp

                                                @for ($i = 0; $i < $fullStars; $i++)
                                                    <i class="fas fa-star" style="color: gold;"></i> 
                                                @endfor

                                                @if ($halfStar)
                                                    <i class="fas fa-star-half-alt" style="color: gold;"></i> 
                                                @endif

                                                @for ($i = $fullStars + ($halfStar ? 1 : 0); $i < 5; $i++)
                                                    <i class="far fa-star" style="color: gold;"></i> 
                                                @endfor
                                            </span>
                                            <span>{{ $movie['imdbRating'] }} IMDb Rating</span>
                                        </li>

                                    </ul>
                                </div>
                                <button class="btn btn-favorite" onclick="toggleFavorite('{{ $movie['imdbID'] }}')">
                                    <i class="fa fa-heart"></i> Add to Favorite
                                </button>
                                <p>{{ $movie['Plot'] }}</p>
                                <div class="gen-socail-share mt-0">
                                    <h4 class="align-self-center">Social Share :</h4>
                                    <ul class="social-inner">
                                        <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" class="instagram"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
function toggleFavorite(imdbID) {
    fetch(`/toggle-favorite/${imdbID}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'added') {
            alert('Movie added to favorites!');
        } else if (data.status === 'removed') {
            alert('Movie removed from favorites.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

</script>
@endsection
