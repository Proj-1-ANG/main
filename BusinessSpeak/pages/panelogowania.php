<?php
if(session_status() == PHP_SESSION_DISABLED) session_start();

use App\class\Mysql;

require('../class/MysqlClass.php');

$db = new Mysql();
$db->connect();

if (isset($_COOKIE['authToken'])) { //logowanie za pomocą ciasteczka
    $query = $db->query("SELECT * FROM users WHERE auth_token = '".$_COOKIE['authToken']."';");
    if($db->num_rows($query)==1) {
        echo "Logowanie się powiodło ";
        $_SESSION['efekt'] = "zalogowano przez ciasteczko";
        header('Location:efekt.php');
        exit();
    } else {// gdy zawartość ciasteczka nie dopowiada żadnemu użytkownikowi
        // echo "Logowanie się  NIE powiodło ";
        // $_SESSION['efekt'] = "NIE zalogowano1";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bussiness Speak - Panel logowania</title>
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>
<body>
	<header> </header>
	<div class='formLogin'>
	<form method='POST' action='../scripts/logowanie.php'>
	<div class='imgContent'>
		<img src='../img/awatar.png' alt='awatar'/>
	</div>
	<div class='formContent'>
		<label for='email'>Email:</label>
		<input type='email' id='email' name='email' required/>
		<label for='haslo'>Haslo:</label>
		<input type='password' id='haslo' name='pass' required/>
		<input type="submit" name="send" value="ZALOGUJ"/>
		<label for='rememberme'>Zapamiętaj mnie:</label>
		<input type='checkbox' name='remember' id='rememberme'/>
	</div>
	</form>
	</div>
</body>
</html>