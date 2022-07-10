@extends('layouts.main')

@section('container')
    <h2 class="mt-5 mb-5">{{ $title }}</h2>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                @if (request('publisher'))
                    <input type="hidden" name="publisher" value="{{ request('publisher') }}">
                @endif

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-light table-hover mt-5">
        <thead>
            <tr class="row">
                <th class="col-md-1" scope="col">#</th>
                <th class="col-md-2" scope="col">Cover</th>
                <th class="col-md-2" scope="col">Name</th>
                <th class="col-md-2" scope="col">Category</th>
                <th class="col-md-2" scope="col">Publisher</th>
                <th class="col-md-1" scope="col">Price</th>
                <th class="col-md-2" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp

            @foreach ($games as $game)
                <tr class="row">
                    <th class="col-md-1 align-middle" scope="row">
                        <p>{{ $i++ }}</p>
                    </th>

                    <td class="col-md-2 align-middle" scope="row">
                        @if ($game->cover)
                            <img src="{{ asset('storage/' . $game->cover) }}" class="col img-fluid rounded-start"
                                alt="{{ $game->title }} " width="100">
                        @else
                            <img src="https://thumbs.dreamstime.com/b/no-image-available-icon-flat-vector-no-image-available-icon-flat-vector-illustration-132482953.jpg"
                                class="col img-fluid rounded-start" alt="{{ $game->title }} " width="100">
                        @endif
                    </td>

                    <td class="col-md-2 align-middle">{{ $game->title }}</td>

                    <td class="col-md-2 align-middle"><a
                            href="?category={{ $game->category->slug }}">{{ $game->category->name }}</a></td>

                    <td class="col-md-2 align-middle"><a
                            href="?publisher={{ $game->publisher->slug }}">{{ $game->publisher->name }}</a>
                    </td>

                    <td class="col-md-1 align-middle">
                        @if ($game->price === 0)
                            Free
                        @else
                            Rp {{ $game->price }}
                        @endif
                    </td>

                    <td class="col-md-2 d-flex flex-column justify-content-center">
                        <a class="btn-sm btn-primary text-center" href="{{ route('games.show', $game->id) }}"
                            style="text-decoration: none">Details</a>
                        <a class="btn-sm btn-success text-center mt-2 mb-2" href="{{ route('games.edit', $game->id) }}"
                            style="text-decoration: none">Edit</a>
                        <form class="d-inline" action="{{ route('games.destroy', $game->id) }}" method="post">
                            @method('delete')
                            @csrf

                            <button onclick="return confirm ('Are you sure?')"
                                class="w-100 btn-sm btn-danger text-center border-0" style="text-decoration: none">Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
