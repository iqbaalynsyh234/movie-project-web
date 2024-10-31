@extends('layouts.master')
@section('title', 'My Favorites')
@section('content')

<section class="gen-section-padding-3">
    <div class="container">
        <h2>My Favorite Movies</h2>
        <div class="row">
            @if (count($favoriteMovies) > 0)
                @foreach ($favoriteMovies as $movie)
                    <div class="col-md-4">
                        <div class="movie-card">
                            <img src="{{ $movie['Poster'] !== 'N/A' ? $movie['Poster'] : asset('assets/image_not_found.png') }}" alt="{{ $movie['Title'] }}">
                            <h4>{{ $movie['Title'] }}</h4>
                            <p><strong>Year:</strong> {{ $movie['Year'] }}</p>
                            <p><strong>IMDb Rating:</strong> {{ $movie['imdbRating'] }}</p>
                            <a href="{{ route('movie.detail', ['imdbID' => $movie['imdbID']]) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                @endforeach
            @else
                <p>You have not added any favorite movies yet.</p>
            @endif
        </div>
    </div>
</section>

@endsection
