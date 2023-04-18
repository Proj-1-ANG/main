<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bussiness Speak - Panel rejestracji</title>
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>
<body>
	<header> </header>
	<div class='formLogin'>
	<form method='post' action='../scripts/rejestracja.php'>
	<div class='imgContent'>
		<img src='../img/awatar.png' alt='awatar'/>
	</div>
	<div class='formContent'>
		<label for='login'>Nickname:</label>
		<input type='text' id='login' name='login' required />
		<label for='email'>Email:</label>
		<input type='email' id='email' name='email' required/>
		<label for='pass'>Haslo:</label>
		<input type='password' id='pass' name='pass' required maxlength="20"/>
		<label for='passConfirm'>Powtórz haslo:</label>
		<input type='password' id='passConfirm' name='passConfirm' required maxlength="20"/>
		<label for='acceptRules'>Akceptuję <a href='privacypolicy.php'>regulamin</a></label>
		<input type='checkbox' name='acceptRules' id='acceptRules'/ required><br/>
		<label for='acceptRODO'>Wyrazam zgode na przetwarzanie rodo</label>
		<input type='checkbox' name='acceptRODO' id='acceptRODO' required/>
		<input type="submit" name="send" value="ZAREJESTRUJ"/>
	</div>
	</form>
	</div>




</body>
</html>