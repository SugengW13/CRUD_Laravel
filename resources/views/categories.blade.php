@extends('layouts.main')

@section('container')
    <h2 class="mt-5 text-center mb-5">Categories</h2>

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="list-group">
                @foreach ($categories as $c)
                    <a class="list-group-item list-group-item-action text-center"
                        href="/games?category={{ $c->slug }}">{{ $c->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
