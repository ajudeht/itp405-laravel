<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class TracksController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {

    $genre = $request->input('genre');

      $tracks = DB::table('tracks')
                  ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
                  ->join('genres', 'tracks.GenreId', '=', 'genres.GenreId')
                  ->select('tracks.Name as Name', 'tracks.UnitPrice as UnitPrice', 'tracks.Composer as Artist', 'albums.Title as Album', 'genres.Name as Genre')
                  ->when($genre, function ($query, $genre) {
                      return $query->where('Genre', $genre);
                  })
                  ->get();

      return view('tracks', [
        'tracks' => $tracks,
        'genre' => $genre
      ]);
    }

    public function addTrackForm()
    {
      $albums = DB::table('albums')->get();
      $mediaTypes = DB::table('media_types')->get();
      $genres = DB::table('genres')->get();

      return view('add-track', [
        'albums' => $albums,
        'mediaTypes' => $mediaTypes,
        'genres' => $genres
      ]);
    }

    public function addTrack(Request $request)
    {

      $validatedData = $request->validate([
          'track' => 'required',
          'album' => 'required',
          'artist' => 'required',
          'price' => 'required|numeric',
          'mediaType' => 'required',
          'genre' => 'required',
          'length' => 'required|numeric',
          'size' => 'required|numeric'
      ]);

      DB::table('tracks')->insert(
          ['Name' => $request->track,
           'AlbumId' => $request->album,
           'MediaTypeId' => $request->mediaType,
           'GenreId' => $request->genre,
           'Composer' => $request->artist,
           'Milliseconds' => $request->length,
           'Bytes' => $request->size,
           'UnitPrice' => $request->price,
         ]
      );

      return redirect('/tracks');
    }

}
