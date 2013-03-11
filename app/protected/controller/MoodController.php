<?php

class MoodController extends DooController {
	public function index() {
		Doo::loadClass('Emotions');

		if ($this->isPost()) {
			$currentMood = $_POST['currentMood'];
			$futureMood = $_POST['futureMood'];
			$time = $_POST['minutes'];
			//check valid emotions
			if (!Emotions::validEmotion($currentMood)) {
				$currentMood = false;
			}
			if (!Emotions::validEmotion($futureMood)) {
				$futureMood = false;
			}
			if ($currentMood && $futureMood) {
				//first determine the track from current to future mood
					// if we have to travel trough +2 moods check if enough time, if not, we show a warning that it will probably 
					// take longer than the selected time
				$track = Emotions::determineTrack($currentMood, $futureMood);
				// get photos for all the different moods
				// get music for all the different moods
				if (is_array($track)) {
					$photos = array();
					$songs = array();
					foreach ($track as $emotion) {
						$photos[$emotion] = ''; //Photo_Manager::
						$songs[$emotion] = ''; //Music_Manager::
					}
				}
			}
		}

		$defaultEmotions = Emotions::getRandomPreset();
		var_dump($defaultEmotions);
		$emotions = Emotions::getAllEmotions();
		ksort($emotions);
		$times = array('5', '10', '15', '20', '25', '30', '35', '40', '45', '50' ,'55', '60');
		$this->render('index', array(
			'emotions' => $emotions,
			'times' => $times,
			'defaultEmotions' => $defaultEmotions
		));
	}

	public function about() {
		$this->render('about');
	}

}