

<?php

require_once('list.php');

$result = '';// assign the empty string to $result
#print_r ($_POST);
$numberOfWords = 0;
$numberIncluded = 0;
$includeSpSymbol = 0;

if(isset($_POST['numberOfWords'])) {$numberOfWords = $_POST['numberOfWords'];}
if(isset($_POST['numberIncluded']) &&
   $_POST['numberIncluded'] == 'Yes') {$numberIncluded = 1;}
if(isset($_POST['includeSpSymbol']) &&
   $_POST['includeSpSymbol'] == 'Yes') {$includeSpSymbol  = 1;}


function generatePassword ($numOfWords, $numIncluded , $inclSpSymbol){
	global $out;
	global $result;
	global $count;
	$wordIndex = [];


	for($i = 0; $i < $numOfWords; $i++) {
		$wordIndex[$i]=rand(0,150);
	}

	for($i = 0; $i < $numOfWords; $i++) {

		$result .= $out[0][$wordIndex[$i]];
	}
	echo $result;

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
