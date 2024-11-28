<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainController extends Controller
{
    public function getHomeContent()
    {
        require_once base_path('./data.php');

        $likedSongsCount = count($likedsongs);
        return view('pages.homeChild', ['librarySidebar' => $library, 'likedSongsCount' => $likedSongsCount, 'playlists' => $playlists, 'madefor' => $madefor, 'jumpback' => $jumpback]);
    }

    public function getLikedSongs()
    {
        require_once base_path('./data.php');

        $likedSongsCount = count($likedsongs);

        return view('pages.likedSongs', ['librarySidebar' => $library, 'likedSongs' => $likedsongs,'likedSongsCount' => $likedSongsCount]);
    }

    public function getMusic($id)
    {
        require_once base_path('./data.php');

        $playlist = $playlists[$id];

        return view('components.footer', ['playlist' => $playlist]);
    }
}
