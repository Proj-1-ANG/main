<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <title>BusinessSpeak - Efekt działania skryptu</title>
</head>
<body>
    <header> </header>
    <div class='panel'>
        <!-- plik testowy -->
        <h1>Efekt Działania Skryptu</h1>
        <p><?php echo (isset($_SESSION['efekt']))?$_SESSION['efekt']:"null"; ?></p>
        <a href="../index.php">powrót na stronę główną</a>
        
    </div>
</body>
</html>