<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite; 

class MovieController extends Controller
{
    public function movieDetail($imdbID)
    {
        $apiUrl = "https://www.omdbapi.com/?apikey=f9d55ac1&i=" . urlencode($imdbID) . "&plot=full&r=json";
        $response = file_get_contents($apiUrl);
        $movie = json_decode($response, true);

        if ($movie['Response'] !== 'True') {
            abort(404, 'Movie not found');
        }

        return view('movie-detail', compact('movie'));
    }
    public function favorites()
    {
        $user = Auth::user();
        $favorites = $user->favorites; 
    
        $favoriteMovies = [];
    
        foreach ($favorites as $favorite) {
            $apiUrl = "https://www.omdbapi.com/?apikey=f9d55ac1&i=" . urlencode($favorite->imdb_id) . "&plot=full&r=json";
            $response = file_get_contents($apiUrl);
            $movie = json_decode($response, true);
    
            if ($movie['Response'] === 'True') {
                $favoriteMovies[] = $movie;
            }
        }
    
        return view('favorites', compact('favoriteMovies'));
    }
    
    public function toggleFavorite($imdbID)
    {
        $user = Auth::user();
        if ($user->favorites()->where('imdb_id', $imdbID)->exists()) {
            $user->favorites()->where('imdb_id', $imdbID)->delete();
            return response()->json(['status' => 'removed']);
        } else {
            $user->favorites()->create(['imdb_id' => $imdbID]);
            return response()->json(['status' => 'added']);
        }
    }
}
