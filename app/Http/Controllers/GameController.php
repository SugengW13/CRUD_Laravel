<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Category;
use App\Models\Publisher;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'All Games';

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'All Games in ' . $category->name;
        }

        if (request('publisher')) {
            $publisher = Publisher::firstWhere('slug', request('publisher'));
            $title = 'All Games by ' . $publisher->name;
        }

        return view(
            'games',
            [
                'title' => $title,
                'games' => Game::with(['category', 'publisher'])->latest()->filter(request(['search', 'category', 'publisher']))->get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'add',
            [
                'title' => 'Add Game',
                'categories' => Category::all(),
                'publishers' => Publisher::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->file('cover')->store('game-covers');

        $validatedData = $request->validate([
            'title' => 'required|max:25',
            'slug' => 'required|unique:games',
            'price' => 'required',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'cover' => 'image|file|max:5120'
        ]);

        if ($request->file('cover')) {
            $validatedData['cover'] = $request->file('cover')->store('game-covers');
        }

        Game::create($validatedData);

        return redirect('/games')->with('success', $validatedData['title'] . ' Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */

    public function show(Game $game)
    {
        return view(
            'game',
            [
                'title' => $game->title,
                'game' => $game
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view(
            'edit',
            [
                'title' => "Editing " . $game->title,
                'game' => $game,
                'categories' => Category::all(),
                'publishers' => Publisher::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $rules = [
            'title' => 'required|max:25',
            'price' => 'required',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'cover' => 'image|file|max:5120'
        ];

        if ($request->slug != $game->slug) {
            $rules['slug'] = 'required|unique:games';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('cover')) {
            if ($request->oldCover) {
                Storage::delete($request->oldCover);
            }
            $validatedData['cover'] = $request->file('cover')->store('game-covers');
        }

        Game::where('id', $game->id)->update($validatedData);

        return redirect('/games')->with('success', $validatedData['title'] . ' Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $gameTitle = $game->title;
        Game::destroy($game->id);

        return redirect('/games')->with('success', $gameTitle . ' Deleted!');
    }

    public function createSlug(Request $request)
    {

        $slug = SlugService::createSlug(Game::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
