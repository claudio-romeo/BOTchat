<?php
try {

    $db = new PDO('mysql:host=localhost;dbname=chatbot;charset=utf8', 'root', '');
} catch (exception $erreur) {
    die('Erreur' . $erreur->getMessage());
}

$text = $_POST['text'];
$newtext = explode(' ', $text);
// var_dump($newtext);
$sql = "SELECT replies FROM bot WHERE queries ";
$tab = [];
foreach ($newtext as $key => $value) {
    if ($key == 0) {
        $sql = $sql . 'LIKE ?';
    } else {
        $sql = $sql . '  OR queries LIKE ?';
    }
    // var_dump($key);
    array_push($tab, "%$value%");
}
// var_dump($sql);
//if
//var_dump($text);
$connect = $db->prepare($sql);
$connect->execute($tab);
// $connect->debugDumpParams();
//var_dump($connect);
$test = $connect->fetch();
//var_dump($test);
//var_dump($row);
if ($test != false) {
    $row = count($test);
    echo $test[0];
} else {
    echo 'Je ne comprend pas votre demande !';
}
//
