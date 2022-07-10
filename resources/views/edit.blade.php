@extends('layouts.main')

@section('container')
    <h2 class="mt-5 mb-5">Edit Game</h2>

    <div class="col-lg-6">
        <form method="post" action="{{ route('games.update', $game->id) }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $game->title }}">

            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $game->slug }}">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $c)
                        @if ($game->category_id == $c->id)
                            <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                        @else
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="publisher" class="form-label">Publisher</label>
                <select class="form-select" name="publisher_id">
                    @foreach ($publishers as $p)
                        @if ($game->publisher_id == $p->id)
                            <option value="{{ $p->id }}" selected>{{ $p->name }}</option>
                        @else
                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $game->price }}">
            </div>

            <div class="mb-3">
                <label for="cover" class="form-label">Cover</label>
                <input type="hidden" name="oldCover" value="{{ $game->cover }}">
                <input class="form-control" type="file" id="cover" name="cover"
                    accept="image/x-png,image/gif,image/jpeg">
            </div>

            <button type="submit" class="btn btn-primary">Edit Game</button>
        </form>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/createSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection
