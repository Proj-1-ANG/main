<?php
session_start();

use App\class\Mysql;

require('../class/MysqlClass.php');

function generateAuthToken()
{
    // Generowanie losowego ciągu znaków
    return bin2hex(random_bytes(32));
}

if (isset($_POST['send']) && !empty($_POST['send'])) {
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

    //sprawdzenie czy pola formularza mają zawartość
    $isFormFilled = true;
    foreach ($_POST as $key => $value) {
        if (empty($value)) {
            $isFormFilled = false;
            break;
        }
    }

    if ($isFormFilled) {
        //zabezpieczenie przed SQL-INJECTION i kodem wpisanym w kontrolke formularza
        $email = mysqli_real_escape_string($db->connection, htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'));
        $password = mysqli_real_escape_string($db->connection, htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8'));

        //logowanie tradycyjne
        $query = $db->query("SELECT * FROM users WHERE email = '" . $email . "';");
        if ($db->num_rows($query) == 1) {
            $data = $db->fetch_array($query);

            if (password_verify($password, $data['password'])) { //porównanie hasła z zaszyfrowanym
                if (isset($_POST['remember']) && $_POST['remember'] == true) {//zapamiętanie użytkownika w przeglądarce
                    // Wygenerowanie tokena uwierzytelniającego
                    $authToken = generateAuthToken();
                    setcookie("authToken", $authToken, (time() + (30 * 24 * 60 * 60)), '/');
                    $query = $db->query("UPDATE users SET auth_token = '" . $authToken . "'  WHERE id= '" . $data['id'] . "';");
                }
                //$_SESSION['user'] = $data['id'];
                $_SESSION['efekt'] = "zalogowano";
                //echo "Logowanie się powiodło ";
            } else {
                $_SESSION['efekt'] = "NIE zalogowano";
                //echo "Logowanie się nie powiodło ";
            }
        } else {
            $_SESSION['efekt'] = "NIE MA TAKIEGO USERA W BAZIE - LOGIN LUB HASŁO ZŁE";
            //echo "Brak usera";
        }
        header('Location:efekt.php');
        exit();
    }
}

?>

