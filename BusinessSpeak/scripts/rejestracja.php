<?php
session_start();

use App\class\Mysql;

require('../class/MysqlClass.php');

if(isset($_POST['send']) && !empty($_POST['send'])) {
    //sprawdzenie czy pola formularza mają zawartość
    $isFormFilled = true;
    foreach($_POST as $key => $value) {
        if(empty($value)) {
            $isFormFilled = false;
            break;
        }
    }

    if($isFormFilled) {
        $db = new Mysql();
        $db->connect();

        //zabezpieczenie przed SQL-INJECTION i kodem wpisanym w kontrolke formularza
        $login = mysqli_real_escape_string($db->connection, htmlspecialchars($_POST['login'], ENT_QUOTES, 'UTF-8'));
        $email = mysqli_real_escape_string($db->connection, htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'));
        $password = mysqli_real_escape_string($db->connection, htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8'));
        $confirm_password = mysqli_real_escape_string($db->connection, htmlspecialchars($_POST['passConfirm'], ENT_QUOTES, 'UTF-8'));

        if(strlen($login)>=3) {
            $query = $db->query("SELECT * FROM users WHERE email = '".$email."';");
            if($db->num_rows($query)==0) {
                //walidacja hasła
                if(strlen($password)>=8 && strlen($password)<=20) {
                    if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,}$/', $password)) {

                        if($password == $confirm_password) {
                            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                            //sprawdzenie akceptacji RORO i Regualminu
                            if(isset($_POST['acceptRules']) &&  $_POST['acceptRules'] == true && isset($_POST['acceptRODO']) &&  $_POST['acceptRODO'] == true) {
                                $query = $db->query("INSERT INTO users (id, login, password, date_registered, email, auth_token) VALUES (null, '".$login."', '".$hashed_password."', '".date('Y-m-d', strtotime('today'))."', '".$email."', null);");
                                if($db->affected_rows($db->connection)==1) {
                                    $_SESSION['efekt'] = "zarejestrowano";

                                    echo "Logowanie się powiodło ";
                                } else {
                                    $_SESSION['efekt'] = "niezarejestrowano";
                                }
                            } else {
                                $_SESSION['efekt'] = "niezaakceptowano rodo i regulaminu";
                            }
                        } else {
                            $_SESSION['efekt'] = "różne hasła";
                        }
                    } else {
                        $_SESSION['efekt'] = "hasło nie spełnia wymagań";
                    }
                } else {
                    $_SESSION['efekt'] = "za krótkie lub długie hasło";
                }
            } else {
                $_SESSION['efekt'] = "mamy taki email w bazie";
            }
        } else {
            $_SESSION['efekt'] = "za krótki login";
        }
        echo $_SESSION['efekt'];
        header('Location:efekt.php');
        exit();
    }
}
