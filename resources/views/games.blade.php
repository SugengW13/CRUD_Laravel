@extends('layouts.main')

@section('container')
    <h2 class="mt-5 mb-5 text-center">{{ $title }}</h2>

    <div class="row justify-content-center mb-5">
        <div class="col-md-6">
            <form action="/">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                @if (request('publisher'))
                    <input type="hidden" name="publisher" value="{{ request('publisher') }}">
                @endif

                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="row justify-content-center">
            <div class="col-md-6 alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="row justify-content-center mb-5">
        <div class="col-md-12">
            <table class="table table-light table-hover">
                <thead>
                    <tr class="row text-center">
                        <th class="col-md-1" scope="col">#</th>
                        <th class="col-md-1" scope="col">Logo</th>
                        <th class="col-md-3" scope="col">Title</th>
                        <th class="col-md-2" scope="col">Category</th>
                        <th class="col-md-2" scope="col">Publisher</th>
                        <th class="col-md-2" scope="col">Price</th>
                        <th class="col-md-1" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp

                    @foreach ($games as $game)
                        <tr class="row text-center">
                            <th class="col-md-1 d-flex align-items-center justify-content-center" scope="row">
                                {{ $i++ }}</th>

                            <td class="col-md-1 d-flex align-items-center justify-content-center" scope="row">
                                @if ($game->cover)
                                    <img src="{{ asset('storage/' . $game->cover) }}" class="col img-fluid rounded-start"
                                        alt="{{ $game->title }} ">
                                @else
                                    <img src="https://thumbs.dreamstime.com/b/no-image-available-icon-flat-vector-no-image-available-icon-flat-vector-illustration-132482953.jpg"
                                        class="col img-fluid rounded-start" alt="{{ $game->title }} ">
                                @endif
                            </td>

                            <td class="col-md-3 d-flex align-items-center justify-content-center">{{ $game->title }}</td>

                            <td class="col-md-2 d-flex align-items-center justify-content-center"><a
                                    href="?category={{ $game->category->slug }}">{{ $game->category->name }}</a></td>

                            <td class="col-md-2 d-flex align-items-center justify-content-center"><a
                                    href="?publisher={{ $game->publisher->slug }}">{{ $game->publisher->name }}</a>
                            </td>

                            <td class="col-md-2 d-flex align-items-center justify-content-center">
                                @if ($game->price === 0)
                                    Free
                                @else
                                    Rp {{ $game->price }}
                                @endif
                            </td>

                            <td class="col-md-1 d-flex flex-column justify-content-center">
                                <a class="btn-sm btn-primary text-center" href="{{ route('games.show', $game->id) }}"
                                    style="text-decoration: none">Details</a>
                                <a class="btn-sm btn-success text-center mt-2 mb-2"
                                    href="{{ route('games.edit', $game->id) }}" style="text-decoration: none">Edit</a>
                                <form class="d-inline" action="{{ route('games.destroy', $game->id) }}" method="post">
                                    @method('delete')
                                    @csrf

                                    <button onclick="return confirm ('Are you sure?')"
                                        class="w-100 btn-sm btn-danger text-center border-0"
                                        style="text-decoration: none">Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
