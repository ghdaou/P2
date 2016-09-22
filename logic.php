

<?php

require_once('list.php');// will make web query and load list once

$result = '';// assign the empty string to $result  which holds display results
$numberOfWords = 0;
$numberIncluded = 0;
$includeSpSymbol = 0;

// load Glogabl variable $_POST into local ones
if(isset($_POST['numberOfWords'])) {$numberOfWords = $_POST['numberOfWords'];}
if(isset($_POST['numberIncluded']) &&
   $_POST['numberIncluded'] == 'Yes') {$numberIncluded = 1;}
if(isset($_POST['includeSpSymbol']) &&
   $_POST['includeSpSymbol'] == 'Yes') {$includeSpSymbol  = 1;}

// Fuction returns a string representation of final outcome based on user input
function generatePassword ($numOfWords, $numIncluded , $inclSpSymbol){
	global $out; //multidimentional word list array holding search words
	global $result;
	$count = 150;
	$wordIndex = [];// array to hold index to random words in $out

 	//load $wordIndex array with random index numbers which act as index to wrods in $out
	for($i = 0; $i < $numOfWords; $i++) {
		$wordIndex[$i]=rand(0, $count);
	}
	//retreive words and create result
	for($i = 0; $i < $numOfWords; $i++) {

		$result .= $out[0][$wordIndex[$i]];
	}

	// and number 5 or & to result based on user choice
    if ($numIncluded == 1) {$result .= '5';}
	if ($inclSpSymbol == 1) {$result .= '&';}

	return $result;
}

# form validation
if(trim($numberOfWords == '')) {
	$displayError = 'Please fill out number of words. ';
	generatePassword (2, 0, 0);
	return;
}
else if(($numberOfWords < 1 or $numberOfWords >9) && (!is_numeric($numberOfWords))) {
	$displayError = 'Number of words may only contain a number between 1 and 9';
	generatePassword (2, 0, 0);
	return;
}

generatePassword ($numberOfWords , $numberIncluded , $includeSpSymbol);
