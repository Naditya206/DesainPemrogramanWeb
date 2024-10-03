<?php

echo "PHP_SELF: " . $_SERVER['PHP_SELF'] . "<br>"; 
echo "SERVER_NAME: " . $_SERVER['SERVER_NAME'] . "<br>"; 
echo "HTTP_HOST: " . $_SERVER['HTTP_HOST'] . "<br>"; 
echo "HTTP_REFERER: " . (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'N/A') . "<br>"; 
echo "HTTP_USER_AGENT: " . $_SERVER['HTTP_USER_AGENT'] . "<br>"; 
echo "SCRIPT_NAME: " . $_SERVER['SCRIPT_NAME']; 
?>
