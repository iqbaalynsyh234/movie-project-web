@extends('layouts.master')
@section('title', 'Dashboard - Welcome ' . $user->name)
@section('content')
<style>
    .hide-search-list {
        display: none;
    }

    #result-container {
        background-color: var(--black);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 3rem;
    }

    .poster {
        margin: 0 auto;
        max-width: 300px;
        border: 4px solid #fff;
    }

    #search-list {
        position: absolute;
        width: 100%;
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 999;
        max-height: 300px;
        overflow-y: auto;
    }

    .search-list-item {
        display: flex;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #f0f0f0;
        cursor: pointer;
    }

    .search-list-item:hover {
        background-color: #f0f0f0;
    }

    .search-list-item img {
        max-width: 40px;
        margin-right: 10px;
        border-radius: 4px;
    }

    /* Styling Movie Info */
    .movie-info {
        text-align: center;
        color: #fff;
        padding-top: 3rem;
    }

    .movie-title {
        font-size: 2rem;
        color: var(--yellow);
    }

    .movie-misc-info {
        list-style: none;
        padding: 1rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .movie-info .year {
        font-weight: 500;
    }

    .movie-info .rating {
        background-color: var(--yellow);
        padding: 0.4rem;
        margin: 0 0.4rem;
        border-radius: 3px;
        font-weight: 600;
    }

    .movie-info .released {
        font-size: 0.9rem;
        opacity: 0.9;
    }

    .movie-info .add-to-fav {
        margin: 1rem 0;
        cursor: pointer;
    }

    .movie-info .add-to-fav:hover {
        color: crimson;
    }

    .movie-info .director {
        padding: 0.5rem;
        margin: 1rem 0;
    }

    .movie-info .genre {
        background-color: #292929;
        display: inline-block;
        padding: 0.5rem;
        border-radius: 3px;
    }

    .movie-info .plot {
        max-width: 400px;
        margin: 1rem auto;
    }

    .movie-info .language {
        color: var(--yellow);
        font-style: italic;
    }

    .movie-info .awards {
        font-weight: 300;
        font-size: 0.9rem;
    }

    .movie-info .awards i {
        color: var(--yellow);
        margin: 1rem 0.7rem 0 0;
    }

    #add-to-fav {
        font-size: 1rem;
        margin: 20px auto;
        width: 250px;
        padding: 10px;
        text-align: center;
        background-color: crimson;
        color: #fff;
        border-radius: 5px;
        height: 50px;
        cursor: pointer;
    }

    #add-to-fav:hover {
        background-color: gold;
    }
</style>
<div id="result-container">
    <div class="owl-carousel owl-theme">
        @if(isset($movies) && count($movies) > 0)
            @foreach($movies as $movie)
                <div class="item movie-info" onclick="window.location.href='{{ route('movie.detail', ['imdbID' => $movie['imdbID']]) }}'">
                    <div class="poster">
                        <img class="movie-poster" src="{{ $movie['Poster'] !== 'N/A' ? $movie['Poster'] : asset('assets/image_not_found.png') }}" alt="Movie Poster">
                    </div>
                    <h3 class="movie-title">{{ $movie['Title'] }}</h3>
                    <ul class="movie-misc-info">
                        <li class="year"><b>Year:</b> {{ $movie['Year'] }}</li>
                    </ul>
                </div>
            @endforeach
        @else
            <p>No movies found. Try searching for something else.</p>
        @endif
    </div>
    <div id="load-more" style="text-align: center; padding: 20px;">Loading more movies...</div>
</div>
<script>
  $(document).ready(function () {
    // Function to append number to the input
    function appendToInput(number) {
      const inputField = $('#phoneNumberInput');
      inputField.val(inputField.val() + number);
    }

    // Event listener for the keypad numbers
    $('.keyboard .number span').click(function () {
      const number = $(this).data('number');  
      appendToInput(number); 
    });

    // Function to clear the last digit (optional)
    $('.delete-key').click(function () {
      const inputField = $('#phoneNumberInput');
      inputField.val(inputField.val().slice(0, -1)); 
    });

    // The rest of your JavaScript code remains the same
    let token;
    function getTwilioAccessToken() {
      $.ajax({
        url: '/phone/access-token',
        method: 'GET',
        success: function (response) {
          token = response.token;
          initializeTwilioDevice(token);
        },
        error: function (xhr) {
          console.error('Gagal mendapatkan token Twilio', xhr);
        }
      });
    }

    // Initialize Twilio Device with token
    function initializeTwilioDevice(token) {
      device = new Twilio.Device(token, {
        logLevel: 1,
        codecPreferences: ['opus', 'pcmu'],
        maxCallSignalingTimeoutMs: 40000
      });

      device.on('ready', function () {
        console.log('Twilio Device siap untuk menerima dan melakukan panggilan.');
      });

      device.on('error', function (error) {
        console.error('Error di Twilio Device:', error);
      });

      device.on('incoming', handleIncomingCall);
    }

    // Make the outgoing call
    $('[data-call="call"]').click(function () {
      const phoneNumber = $('#phoneNumberInput').val().trim();
      if (phoneNumber) {
        $.ajax({
          url: '/calls/make',  
          method: 'POST',
          data: {
            phoneNumber: phoneNumber,  
            _token: $('meta[name="csrf-token"]').attr('content')
          },
          success: function (response) {
            console.log('Panggilan berhasil dimulai:', response.message);
          },
          error: function (xhr) {
            console.error('Error memulai panggilan:', xhr.responseJSON.message);
          }
        });
      } else {
        alert('Harap masukkan nomor telepon yang valid.');
      }
    });

    // Incoming call handler
    function handleIncomingCall(call) {
      console.log('Panggilan masuk dari:', call.parameters.From);
      call.accept();
    }

    getTwilioAccessToken();
  });
</script>
@endsection
