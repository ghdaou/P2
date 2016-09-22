
<?php
$content = file_get_contents('http://www.paulnoll.com/Books/Clear-English/words-01-02-hundred.html');

preg_match_all("/<li>[A-Za-z\\s]*<\/li>/",
    $content,
    $out, PREG_PATTERN_ORDER);
//
// fuction gets file content and parses content between list tags and stores in $out Array
