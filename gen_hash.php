<?php
try{
$random_word = `shuf -n 1 password.lst`;
$pwd_arr = array();
$random_word = trim($random_word);
//echo strlen($random_word);
//echo $random_word;
//echo"<br>";
array_push($pwd_arr, $random_word);
$next_password = $random_word.'16';
array_push($pwd_arr,$next_password);
array_push($pwd_arr,'in11diana12');

$dutch_word = `shuf -n 1 dutch`;
array_push($pwd_arr,$dutch_word);


$a = $_GET["name"];
$user = substr($a, 0, -1);                                                               
$index = substr($a,-1) % (count($pwd_arr)+1);
if ($index <= 0)
{
$index = 1;
}
$pwd =  $pwd_arr[$index-1];
$cmd = "openssl passwd -1 ".$pwd;
$res = `$cmd`;
echo "$user:$res";
}catch(Exception $e){
header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
}
?>
