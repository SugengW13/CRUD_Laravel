@extends('layouts.main')

@section('container')
    <h2 class="mt-5">Publishers</h2>


    <ul>
        @foreach ($publisher as $p)
            <li>
                <h3><a href="/games?publisher={{ $p->slug }}">{{ $p->name }}</a></h3>
            </li>
        @endforeach
    </ul>
@endsection
