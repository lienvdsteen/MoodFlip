<?php

class Music_Manager {

	public function __construct() {

	}

	public function getSongsByTag($tag) {
		// for starters we'll try to connect on last.fm
		$lastFmApiDetails = Services::getServiceConfig(Services::TYPE_LASTFM);
		Doo::loadClass('Music/Lastfm');
		$songs = Music_Lastfm::getSongsByTag($tag, 5);	
		if (is_array($songs)) {
			// now get the songs from youtube
			$newSongs = array();
			foreach ($songs as $song) {
				Doo::loadClass('Music/YouTube');
				if (isset($song['name']) && isset($song['artist']['name'])) {
					$newSongs[] = Music_YouTube::getSongByLastFmDetails($song['name'], $song['artist']['name']);	
				}
				else {
					//@todo lien: no title or artist name found in the lastfm stuff
				}
			}
		}
		else {
			//@todo lien: find songs for this tag on another service (try soundcloud, the hype machine, others?)
		}
		return $newSongs;
	}

	private static function transformJsonTagToArray($songs, $assoc = false) {
		return json_decode($songs, $assoc);
	}
}