@extends('layouts.main')

@section('container')
    <div class="card mb-3 mt-5" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                @if ($game->cover)
                    <img src="{{ asset('storage/' . $game->cover) }}" class="img-fluid rounded-start"
                        alt="{{ $game->title }}">
                @else
                    <img src="https://static.vecteezy.com/system/resources/previews/000/551/599/original/user-icon-vector.jpg"
                        class="img-fluid rounded-start" alt="{{ $game->title }}">
                @endif

            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">{{ $game->title }}</h3>
                    <p>Category : <a href="/games?category={{ $game->category->slug }}">{{ $game->category->name }}</a>
                    </p>
                    <p>Publisher : <a
                            href="/games?publisher={{ $game->publisher->slug }}">{{ $game->publisher->name }}</a>
                    </p>
                    <p class="card-text">Price : {{ $game->price }}</p>
                    <a class="btn btn-primary" href="/" role="button">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
