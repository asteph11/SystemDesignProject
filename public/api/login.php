<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
//header('Content-Type: application/json');

require_once ("connect.php");

$conn = connect();

$func = $_GET['func'];

switch($func) {
    case 'auth': {
        authorization($conn);
        break;
    }default: {
        echo "Error: No function matching request.";
        break;
    }
}

function authorization($conn) {
    if(!(isset($_GET['email'], $_GET['pass']))) {
        echo "Incomplete request";
    }

    $email = $_GET['email'];
    $pass = $_GET['pass'];


    $stmt = $conn->prepare("SELECT id, firstName, lastName FROM Users WHERE (email='$email' AND pin='$pass');");
    $stmt->execute();

    $out_id = -1;
    $out_fname = '';
    $out_lname = '';
    $stmt->bind_result($out_id, $out_fname, $out_lname);

    $arr = [];
    while ($stmt->fetch()) {
        $arr['id'] = $out_id;
        $arr['firstName'] = $out_fname;
        $arr['lastName'] = $out_lname;
    }
    echo(json_encode($arr));

    mysqli_close($conn);
}

