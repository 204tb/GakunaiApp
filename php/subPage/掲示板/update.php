<?php
require_once "components/connect.php";
require_once('../Components/user_check.php');

$_SESSION["errors"]=[
    "title" => "",
    "text" => ""
];

if(empty($_POST["title"])){
    $_SESSION["errors"]["title"] = "タイトルが入力されていません";
}
if(empty($_POST["text"])){
    $_SESSION["errors"]["text"] ="本文が入力されていません";
}
if(!empty($errors)){
    $_SESSION["errors"]=$errors;
    header("Location: board.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST" && (!empty($_POST["title"]) && !empty($_POST["text"]))){
    $title=$_POST["title"];
    $user_text=$_POST["text"];
    $sql = "INSERT INTO userlog(title,name,text) VALUES(:title,:name,:user_text)";//文字列として読み込ませないとカラムと勘違いする
    //bindparamで値を紐づける
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":title" => $title,":name" => $user["student_name"],"user_text" => $user_text]);//":name" => $user_name,":text" => $user_text
}
header("Location: board.php");
?>