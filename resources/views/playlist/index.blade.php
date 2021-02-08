@extends('layouts.main')

@section('title', 'Playlists')

@section('content')
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Playlist</th>
        </tr>
    </thead>
    <tbody>
        @foreach($playlists as $playlist)
        <tr>
            <td>
                {{$playlist->id}}
            </td>
            <td>
                <a href="{{route('playlist.show', ['id' => $playlist->id])}}">
                    {{$playlist->name}}
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
