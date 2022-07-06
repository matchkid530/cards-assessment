<?php
class Card {

	public function createCards() {
		$types = array('S', 'H', 'D', 'C');
		$numbers = array('A', '2', '3', '4', '5', '6', '7', '8', '9', 'X', 'J', 'Q', 'K');
		$cards = array();
		$i = 0;
		foreach($types as $type) {
			$i++;
			foreach($numbers as $number) {
					$cards[$i] = $type."-".$number;
					$i++;
			}
		}
		return $cards;
	}

	public function shuffleCards($cards) {
		$keys = array_keys($cards);
		shuffle($keys);
		$shuffledCards = array();
		foreach ($keys as $key) {
			$shuffledCards[$key] = $cards[$key];
		}
		return $shuffledCards;
	}

	public function distributeCards($shuffledCards, $totalPlayer) {
		$i = 0;
		$count = count($shuffledCards);
		while($shuffledCards != null) {
			for($p = 1; $p <= $totalPlayer; $p++) {
				$i = $i+1;
				if ($p <= $count) {
					//remove card after picked one card
					$pickCard = array_shift($shuffledCards);
					if($pickCard) {
						//assigning card to the player
						$playerCard[$p][$i] =  $pickCard;
					}
				} else {
					//define extra players who do not have a single card
					$playerCard[$p][$i] =  "(Having popcorn!)";
				}
			}
		}
		return $playerCard;
	}
}
?>
