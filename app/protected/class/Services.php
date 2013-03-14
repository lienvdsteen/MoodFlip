<?php

class Services {
	// tumblr
	const TYPE_TUMBLR = 'tumblr';
	const TUMBLR_CONSUMER_KEY = 'klBeZdmqf0fwJpSYgTfGq7hJRsqcAbVntF9Ob0T1WnNcVeOyTi';
	const TUMBLR_CONSUMER_SECRET = 'doeItIeHKeyL9dWjyybyQgSsfFcGc7ilhG0u4Ge6IAxNoyi4y4';

	// soundcloud
	const TYPE_SOUNDCLOUD = 'soundcloud';
	const SOUNDLCLOUD_CLIENT_ID = 'a9a2079ae79ae8232429dd32704195bf';
	const SOUNDCLOUD_CLIENT_SECRET = 'd635c9e4c7dddc9219a554bb406b9809';

	// eyeem
	const TYPE_EYEEM = 'eyeem';
	const EYEEM_CLIENT_ID = 'QmkzXnnqZ05IhjxMMI3qUWzwaywZM460';
	const EYEEM_CLIENT_SECRET = 'XFBIX8epD5YLDpj3usmx8Ph5dXEgxYcE';

	// instagram
	const TYPE_INSTAGRAM = 'instagram';
	const INSTAGRAM_CLIENT_ID = '01526ab03e6b4a728a7564d831251f94';
	const INSTAGRAM_CLIENT_SECRET = '68f3f26c092e403d85f9cb143f42b960';

	// last.fm
	const TYPE_LASTFM = 'lastfm';
	const LASTFM_CLIENT_ID = '587d756f9537a9f1b0bfbf6d02031afc';
	const LASTFM_CLIENT_SECRET = '224284eb1a4a12a6ce9742e5c85ea55a';
	const LASTFM_URL = 'http://ws.audioscrobbler.com/2.0/';

	// youtube
	const TYPE_YOUTUBE = 'youtube';
	const YOUTUBE_DEVELOPER_KEY = 'AI39si6AfeOFAQypT4k37K8KZsuF378GBQk7dXa0OhlkdHaJXwPHSuNASgkDAESRkgStQxkuEuCb4GL1kr9wCHCCSKF4ScRQrA';
	const YOUTUBE_URL = 'https://gdata.youtube.com/';
 
	private static $_servicesConfig = array(
		self::TYPE_TUMBLR => array(
			'id' => self::TUMBLR_CONSUMER_KEY,
			'secret' => self::TUMBLR_CONSUMER_SECRET
		),
		self::TYPE_SOUNDCLOUD => array(
			'id' => self::SOUNDLCLOUD_CLIENT_ID,
			'secret' => self::SOUNDCLOUD_CLIENT_SECRET
		),
		self::TYPE_EYEEM => array(
			'id' => self::EYEEM_CLIENT_ID,
			'secret' => self::EYEEM_CLIENT_SECRET
		),
		self::TYPE_INSTAGRAM => array(
			'id' => self::INSTAGRAM_CLIENT_ID,
			'secret' => self::INSTAGRAM_CLIENT_SECRET
		),
		self::TYPE_LASTFM => array(
			'id' => self::LASTFM_CLIENT_ID,
			'secret' => self::LASTFM_CLIENT_SECRET,
			'url' => self::LASTFM_URL
		),
		self::TYPE_YOUTUBE => array(
			'id' => self::YOUTUBE_DEVELOPER_KEY,
			'secret' => self::YOUTUBE_DEVELOPER_KEY,
			'url' => self::YOUTUBE_URL
		)
	);

	public static function getAllServicesConfig() {
		return self::$_servicesConfig;
	}

	public static function isValidService($service) {
		return in_array($service, self::$_servicesConfig);
	}

	public static function getServiceConfig($service) {
		$services = self::$_servicesConfig;
		return $services[$service];
	}
}