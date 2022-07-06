<?php
require '../class/Card.php';
//Get input of total player
$totalPlayer = $_POST['total_player'];
//Validation of input (start)
if (!is_numeric($totalPlayer) || $totalPlayer < 1) {
	echo "<p class='warning'>Value is invalid!</p>";
	//stop all remaing process when getting invalid input
	exit();
}
/************************************************************
 Too much number of player requested may affect fatal error
 regarding the memory size you set up PHP to handle in one process.
 To resolve this, edit the memory_limit in php.ini
 Sometime is the server's OS itself, use larger bit OS for more players.
************************************************************/
// Instantiate Card
$card = new Card();
//getting card list
$cards = $card->createCards();
//shuffle cards
if (count($cards)) {
	$shuffledCards =  $card->shuffleCards($cards);
} else {
	echo "<p class='warning'>Cards are not generated!</p>";
	exit();
}
//distributing cards
if (count($shuffledCards)) {
	$playerCard =  $card->distributeCards($shuffledCards, $totalPlayer);
} else {
	echo "<p class='warning'>Cards are not shuffled!</p>";
	exit();
}
//prepare result (start)
$result = "";
if (count($playerCard)) {
	foreach($playerCard as $numbering => $playerCards){
		$result .= '<div class="result-row">
									<div>Player '.$numbering.' : </div>
									<div>'.implode($playerCards,', ').'</div>
								</div>';
	}
} else {
	$result = "<p class='warning'>Unknown issue occurs!</p>";
}
//prepare result (end)
//return result
echo $result;
?>
