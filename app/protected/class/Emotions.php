<?php

/**
 * source http://catalog.flatworldknowledge.com/bookhub/reader/127?e=stangor-ch10_s01
 * http://images.flatworldknowledge.com/stangor/stangor-fig10_003.jpg
 */

class Emotions {
	const EMOTION_CATEGORY_INTENSE = 'intense';
	const EMOTION_CATEGORY_PLEASANT = 'pleasant';
	const EMOTION_CATEGOTY_MILD = 'mild';
	const EMOTION_CATEGORY_UNPLEASANT = 'unpleasant';

	// emotions in first kwadrant (between intense and pleasant)
	const EMOTION_TYPE_ASTONISHED = 'astonished';
	const EMOTION_TYPE_EXCITED = 'excited';
	const EMOTION_TYPE_AMUSED = 'amused';
	const EMOTION_TYPE_HAPPY = 'happy';
	const EMOTION_TYPE_DELIGHTED = 'delighted';
	const EMOTION_TYPE_GLAD = 'glad';
	const EMOTION_TYPE_PLEASED = 'pleased';

	// emotions in second kwadrant (between pleasant and mild)
	const EMOTION_TYPE_CONTENT = 'content';
	const EMOTION_TYPE_SATISFIED = 'satisfied';
	const EMOTION_TYPE_SERENE = 'serene';
	const EMOTION_TYPE_AT_EASE = 'at_ease';
	const EMOTION_TYPE_CALM = 'calm';
	const EMOTION_TYPE_SLEEPY = 'sleepy';
	const EMOTION_TYPE_TIRED = 'tired';

	// emotions in third kwadrant (between mild and unpleasant)
	const EMOTION_TYPE_DROOPY = 'droopy';
	const EMOTION_TYPE_BORED = 'bored';
	const EMOTION_TYPE_GLOOMY = 'gloomy';
	const EMOTION_TYPE_DEPRESSED = 'depressed';
	const EMOTION_TYPE_SAD = 'sad';
	const EMOTION_TYPE_MISERABLE = 'miserable';

	// emotions in fourth kwadrant (between intense and unpleasant)
	const EMOTION_TYPE_DISTRESSED = 'distressed';
	const EMOTION_TYPE_ANNOYED = 'annoyed';
	const EMOTION_TYPE_FRUSTRATED = 'frustrated';
	const EMOTION_TYPE_TENSE = 'tense';
	const EMOTION_TYPE_ANGRY = 'angry';
	const EMOTION_TYPE_AFRAID = 'afraid';
	const EMOTION_TYPE_ALARMED = 'alarmed';

	private static $_emotionsConfig = array(
		self::EMOTION_TYPE_ASTONISHED => array(
			'value' => 'Astonished',
			'x' => 0.1,
			'y' => 0.9
		),
		self::EMOTION_TYPE_EXCITED => array(
			'value' => 'Excited',
			'x' => 0.5,
			'y' => 0.8
		),
		self::EMOTION_TYPE_AMUSED => array(
			'value' => 'Amused',
			'x' => 0.3,
			'y' => 0.7
		),
		self::EMOTION_TYPE_HAPPY => array(
			'value' => 'Happy',
			'x' => 0.7,
			'y' => 0.6
		),
		self::EMOTION_TYPE_DELIGHTED => array(
			'value' => 'Delighted',
			'x' => 0.6,
			'y' => 0.5
		),
		self::EMOTION_TYPE_GLAD => array(
			'value' => 'Glad',
			'x' => 0.65,
			'y' => 0.3
		),
		self::EMOTION_TYPE_PLEASED => array(
			'value' => 'Pleased',
			'x' => 0.7,
			'y' => 0.2
		),
		self::EMOTION_TYPE_CONTENT => array(
			'value' => 'Content',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_SATISFIED => array(
			'value' => 'Satisfied',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_SERENE => array(
			'value' => 'Serene',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_AT_EASE => array(
			'value' => 'At Ease',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_CALM => array(
			'value' => 'Calm',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_SLEEPY => array(
			'value' => 'Sleepy',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_TIRED => array(
			'value' => 'Tired',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_DROOPY => array(
			'value' => 'Droopy',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_BORED => array(
			'value' => 'Bored',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_GLOOMY => array(
			'value' => 'Gloomy',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_DEPRESSED => array(
			'value' => 'Depressed',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_SAD => array(
			'value' => 'Sad',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_MISERABLE => array(
			'value' => 'Miserable',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_DISTRESSED => array(
			'value' => 'Distressed',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_ANNOYED => array(
			'value' => 'Annoyed',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_FRUSTRATED => array(
			'value' => 'Frustrated',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_TENSE => array(
			'value' => 'Tense',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_ANGRY => array(
			'value' => 'Angry',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_AFRAID => array(
			'value' => 'Afraid',
			'x' => 1,
			'y' => 9
		),
		self::EMOTION_TYPE_ALARMED => array(
			'value' => 'Alarmed',
			'x' => 1,
			'y' => 9
		)
	);

	public static function getAllEmotions() {		
		return self::$_emotionsConfig;
	}

	public static function validEmotion($emotion) {
		return in_array($emotion, self::$_emotionsConfig);
	}
	
	/**
	 * this function will return in order the moods we have to travel to go from the current mood to the future mood
	 * @param  string 	$currentMood
	 * @param  string 	$futureMood  
	 * @return array 	$moods
	 */	
	public static function determineTrack($currentMood, $futureMood) {
		$moods = array();
		return $moods;
	}
}