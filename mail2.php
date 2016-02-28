
<?php
// define variables and set to empty values
$errors = array();
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];

    if (empty($_POST["name"])) {
        $errors['name'] = 'Name is required';
    }

    if (empty($_POST["email"])) {
        $errors['email'] = 'Email is required';
    }

    if (empty($_POST["phone"])) {
        $errors['phone'] = 'Phone is required';
    }

    $comment = $_POST["comment"];



$T = 'uzytkownik '.$name.' email: '.$email.' tel: '. $phone.' wiadomość: '.$comment;

if(count($errors) != 0)
    {
        echo 'nie ok';
    }
    else{
        $result = mail('majkel170792@gmail.com', 'Zapytanie:', $T, 'From: '.$email );
        if($result)
        {
            echo 'ok';
        }
        else{
            echo 'nie frytki';
        }
}
