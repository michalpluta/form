
<?php
// define variables and set to empty values
$nameErr = $emailErr = $phoneErr = "";
$name = $email = $comment = $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
    } else {
        $phone = test_input($_POST["phone"]);
        if(preg_match("/^[\+0-9\-\(\)\s]*$/", $phone)) {
            $phoneErr = "Invalid phone format";
        }
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$T = 'uzytkownik '.$name.' email: '.$email.' tel: '. $phone.' wiadomość: '.$comment;

if ((!empty($nameErr) || (!empty($emailErr)) || (!empty($nameErr))))
{
    echo 'nie ok';
}
else{
    echo 'ok';
    mail('majkel170792@gmail.com', 'Zapytanie:', $T, 'From: '.$email );
}


echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $phone;
echo "<br>";
echo $comment;

