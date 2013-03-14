<?php

class Music_YouTube {

	public static function getSongByLastFmDetails($title, $artistname) {
		$apiDetails = new Api(Services::TYPE_YOUTUBE);
		$keywordSearch = self::makeKeywordSearch($title, $artistname);
		$song = $apiDetails->makeApiCall('GET', 'feeds/api/videos?', array(
			'v' => 2,
			'alt' => 'jsonc',
			'q' => $keywordSearch,
			'max-results' => 1,
			'format' => 5
		), true, false);
		$song = self::jsonToArray($song, true);
		if (is_array($song) && isset($song['data']['items'])) {
			$id = self::getIdFromResult($song['data']['items']);	
		}
		else {
			//@todo lien: no array or no items :(
			return false;
		}
		return $id;
	}

	private static function getIdFromResult($song) {
		foreach ($song as $s) {
			if (isset($s['id'])) {
				return $s['id'];
			}
			else {
				return false;
			}
		}
	}

	private static function jsonToArray($songs, $assoc = true) {
		return json_decode($songs, $assoc);
	}

	private static function makeKeywordSearch($title, $artistname) {
		$keywordSearch = str_replace(' ', '+', $title);
		$keywordSearch .= '+' . str_replace(' ', '+', $artistname);
		return $keywordSearch;
	}
}