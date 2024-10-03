<?php
$x = 75; 
$y = 25;

function addition() {
    
    global $x, $y;
    
    return $x + $y;
}

$z = addition();

echo $z;
?>
