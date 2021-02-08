<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PlaylistController extends Controller
{
    //
    public function index()
    {
        $playlists = DB::table('playlists')
            ->get([
                'id',
                'name'
            ]);
        return view('playlist.index', [
            'playlists' => $playlists
        ]);
    }

    public function show($id)
    {

        $playlist = DB::table('playlists')
            ->where('id', '=', $id)
            ->first();


        $playlistItems = DB::table('playlist_track')
            ->where('playlist_track.playlist_id', '=', $id)
            ->join('tracks', 'playlist_track.track_id', '=', 'tracks.id')
            ->join('albums', 'tracks.album_id', '=', 'albums.id')
            ->join('genres', 'tracks.genre_id', '=', 'genres.id')
            ->get([
                'tracks.id',
                'tracks.name AS track',
                'albums.title AS album',
                'tracks.composer AS artist',
                'genres.name AS genre',
            ]);

        return view('playlist.show', [
            'playlist' => $playlist,
            'playlistItems' => $playlistItems,
        ]);
    }
}




/*
 *
 *
 *ended trying to execute query to load tracks according to playlist
 *
 *
 *
 * */
