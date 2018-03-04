<?php
    if(!empty($_SESSION['ID'])) {
        header('Location: ?p=home');
    }
    else if(!empty($_POST['mail'] AND $_POST['pass']))
    {
        $mail = strtolower($_POST['mail']);
        $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

        if(!empty($_POST['name'] AND $_POST['sname'])) {
            $name = $_POST['name'];
            $sname = $_POST['sname'];

            $check = userExist($mail);

            if($check) {
                $error = 'Un compte avec l\'adresse e-mail ' . $_POST['mail'] . ' existe déjà.';
            }
            else if($name == $sname) {
                $error = 'Le nom renseigné est identique au prénom.';
            }
            else if($name == $_POST['pass'] OR $sname == $_POST['pass']) {
                $error = 'Le mot de passe est identique à votre nom ou prénom.';
            }
            else {
                if(addUser($mail, $name, $sname, $pass)) {
                    header('Location: ?p=home');
                }
                else {
                    $error = 'Certains champs n\'ont pas été rempli.';
                }
            }
        }
        else {
            $log = getUserInfos($mail);
            $hash = $log['user_pass'];

            if(!empty($hash) AND password_verify($_POST['pass'], $hash))
            {
                $_SESSION['ID'] = $log['ID'];
                $_SESSION['mail'] = $log['user_mail'];

                header('Location: ?p=home');
            }
            else {
                $error = 'Le mot de passe est incorrect.';
            }
        }
    }
    else {
        $notification = 'Bonjour ;)';
    }
?>
