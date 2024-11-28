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

    public function getLikedSongsWithMusic($id)
    {
        require_once base_path('./data.php');

        $likedSongsCount = count($likedsongs);

        $selectedSong = null;
        foreach ($likedsongs as $song) {
            if ($song['id'] == $id) {
                $selectedSong = $song;
                break; 
            }
        }

        return view('pages.likedSongsWithMusic', ['librarySidebar' => $library, 'likedSongs' => $likedsongs,'likedSongsCount' => $likedSongsCount, 'selectedSong' => $selectedSong]);
    }
}
