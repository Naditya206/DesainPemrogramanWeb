<?php

$patternLowercase = '/[a-z]/';
$textLowercase = 'This is a Sample Text.';

if (preg_match($patternLowercase, $textLowercase)) {
    echo "Huruf kecil ditemukan!<br>";
} else {
    echo "Tidak ada huruf kecil!<br>";
}

$patternDigit = '/[0-9]+/'; 
$textDigit = 'There are 123 apples.';

if (preg_match($patternDigit, $textDigit, $matches)) {
    echo "Cocokkan: " . $matches[0] . "<br>";
} else {
    echo "Tidak ada yang cocok!<br>";
}


$patternReplace = '/apple/'; 
$replacement = 'banana';
$textReplace = 'I like apple pie.';
$new_text = preg_replace($patternReplace, $replacement, $textReplace);

echo $new_text . "<br>"; 


$patternGod = '/go{0,1}d/'; 
$textGod = 'god is good.';

if (preg_match($patternGod, $textGod, $matches)) {
    echo "Cocokkan: " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}
?>
