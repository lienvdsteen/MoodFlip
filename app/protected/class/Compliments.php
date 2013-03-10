<?php
/**
 * Compliments Class: this class will give random compliments when one of our users is feeling down.
 * currently the compliments are coming from:
 * - http://emergencycompliment.com
 */

class Compliments {
	private static $_compliments = array(
		"Your prom date still thinks about you all the time.",
		"All your friends worry they aren\u2019t as funny as you.",
		"Your boss loved that thing you did at work today.",
		"Your blog is the best blog.",
		"Those shoes were a great call.",
		"Hey, did you lose weight? (not that you needed to!)",
		"You are the most charming person in a 50 mile vicinity.",
		"Everyone was super jealous of your SAT score.",
		"Today's outfit = Thumbs up.",
		"I want to kiss you. I hope that's not too forward of me.",
		"That song was definitely written for you.",
		"You're not crazy, they are 100% into you.",
		"Your parents are more proud of you than you'll ever know.",
		"You actually looked super graceful that time you tripped in front of everyone.",
		"You don't get drunk, you get superhuman.",
		"You could be an astronaut if you wanted. NASA told me so.",
		"Your hair smells like freshly cut grass.",
		"Your pet loves you too much to ever run away.",
		"They've never told you this, but your boss is really impressed by you.",
		"The kid you passed on the street today wants to grow up to be like you.",
		"Keep walking around naked. Your neighbors are into it.",
		"You have the power to start and WIN a dance-off.",
		"You've never had morning breath. I swear.",
		"You'd be the last one standing in a horror movie.",
		"You're a benevolent tipper.",
		"You're the best at making cereal."
	);

	public static function getAllCompliments() {
		return self::$_compliments;
	} 

	public static function giveCompliment() {
		return array_rand(self::$_compliments);
	}
}