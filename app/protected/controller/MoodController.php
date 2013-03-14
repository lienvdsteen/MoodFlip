<?php

class MoodController extends DooController {
	public function index() {
		$this->data['action'] = 'index';
		Doo::loadClass('Emotions');
		Doo::loadClass('Api');
		Doo::loadClass('Services');
		Doo::loadClass('Compliments');
		
		if ($this->isPost()) {
			$currentMood = $this->escape($_POST['currentMood']);
			$futureMood = $this->escape($_POST['futureMood']);
			$time = $this->escape($_POST['minutes']);

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
					Doo::loadClass('Music/Manager');
					$music = new Music_Manager();
					foreach ($track as $emotion) {
						$songs[$emotion] = $music->getSongsByTag($emotion);
					}
				}
			}
		}

		$compliment = Compliments::giveCompliment();
		$defaultEmotions = Emotions::getRandomPreset();
		$emotions = Emotions::getAllEmotions();
		ksort($emotions);
		$times = array('5', '10', '15', '20', '25', '30', '35', '40', '45', '50' ,'55', '60');
		$this->view()->renderLayout('mood', 'index', array(
			'emotions' => $emotions,
			'times' => $times,
			'defaultEmotions' => $defaultEmotions,
			'action' => 'index',
			'songs' => isset($songs) ? $songs : false,
			'currentMood' => isset($currentMood) ? $currentMood : false,
			'futureMood' => isset($futureMood) ? $futureMood : false,
			'message' => $compliment
		));
	}

	public function about() {
		$this->view()->renderLayout('mood', 'about', array(
			'action' => 'about'
		));
	}

	public function contact() {
		$this->view()->renderLayout('mood', 'contact', array(
			'action' => 'contact'
		));
	}
}