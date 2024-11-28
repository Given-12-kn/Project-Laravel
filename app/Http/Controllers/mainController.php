<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainController extends Controller
{
    

    public function getSidebar()
    {
        require_once base_path('./data.php');

        $likedSongsCount = count($likedsongs);
        return view('pages.homeChild', ['librarySidebar' => $library, 'likedSongs' => $likedSongsCount, 'playlists' => $playlists, 'madefor' => $madefor, 'jumpback' => $jumpback]);
    }
}
