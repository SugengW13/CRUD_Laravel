@extends('layouts.main')

@section('container')
    <h2 class="mt-5">Categories</h2>


    <ul>
        @foreach ($categories as $c)
            <li>
                <h3><a href="/games?category={{ $c->slug }}">{{ $c->name }}</a></h3>
            </li>
        @endforeach
    </ul>
@endsection
