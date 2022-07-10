@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-3 card p-2">
            @if ($game->cover)
                <img src="{{ asset('storage/' . $game->cover) }}" class="img-fluid rounded-start" alt="{{ $game->title }}">
            @else
                <img src="https://thumbs.dreamstime.com/b/no-image-available-icon-flat-vector-no-image-available-icon-flat-vector-illustration-132482953.jpg"
                    class="col img-fluid rounded-start" alt="{{ $game->title }} ">
            @endif

            <div class="card-body">
                <h5 class="card-title">{{ $game->title }}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Category :
                    <a href="/games?category={{ $game->category->slug }}">{{ $game->category->name }}</a>
                </li>
                <li class="list-group-item">Publisher :
                    <a href="/games?publisher={{ $game->publisher->slug }}">{{ $game->publisher->name }}</a>
                </li>
                <li class="list-group-item">
                    Price :
                    @if ($game->price === 0)
                        Free
                    @else
                        Rp {{ $game->price }}
                    @endif
                </li>
            </ul>
            <div class="card-body">
                <a class="btn btn-primary card-link" href="/" role="button">Back</a>
            </div>
        </div>
    </div>
@endsection
