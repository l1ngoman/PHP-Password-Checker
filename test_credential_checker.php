<?php
require './credential_checker.php';

$checker = new Checker;

echo "No Length Error: <br>";
$checker->evaluate('Andrew45','arlington');
echo "Username ".$checker->errors['Username'];
echo "Password ".$checker->errors['Password'];
echo "<br>";
echo "User Length Error: <br>";
$checker->evaluate('Andy','arlington');
echo "Username ".$checker->errors['Username'];
echo "Password ".$checker->errors['Password'];
echo "<br>";
echo "Pass Length Error: <br>";
$checker->evaluate('Andrew45','al');
echo "Username ".$checker->errors['Username'];
echo "Password ".$checker->errors['Password'];
echo "<br><hr><br>";

echo "No Same Error: <br>";
$checker->evaluate('Andrew45','arlington');
echo "Username ".$checker->errors['Username'];
echo "Password ".$checker->errors['Password'];
echo "User/Pass ".$checker->errors['User/Pass'];
echo "<br>";
echo "Same Error: <br>";
$checker->evaluate('Andrew','anDrew');
echo "Username ".$checker->errors['Username'];
echo "Password ".$checker->errors['Password'];
echo "User/Pass ".$checker->errors['User/Pass'];
?>