<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class GenresController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {

      $genres = DB::table('genres')->get();

      return view('genres', [
        'genres' => $genres
      ]);
    }


    public function editGenreForm($id)
    {
      $genre = DB::table('genres')->where('GenreId', '=', $id)->first();

      return view('edit-genre', [
        'genre' => $genre
      ]);
    }

    public function editGenre(Request $request)
    {

      $validatedData = $request->validate([
          'name' => 'required|unique:genres|min:3',
          'id' => 'required'
      ]);

      DB::update('update genres set Name = ? where GenreId = ?', [$request->name,$request->id]);


      return redirect('/genres');
    }

}
