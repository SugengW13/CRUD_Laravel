@extends('layouts.main')

@section('container')
    <h2 class="mt-5 text-center mb-5">Publishers</h2>

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="list-group">
                @foreach ($publisher as $p)
                    <a class="list-group-item list-group-item-action text-center"
                        href="/games?publisher={{ $p->slug }}">{{ $p->name }}</a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- <h2 class="mt-5 text-center mb-5">Publishers</h2>

    <ul>
        @foreach ($publisher as $p)
            <li>
                <h3><a href="/games?publisher={{ $p->slug }}">{{ $p->name }}</a></h3>
            </li>
        @endforeach
    </ul> --}}
@endsection
