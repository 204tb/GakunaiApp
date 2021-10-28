<?php
    require_once "components/connect.php";
    session_start();
    //POSTデータからタイトルと返信を受け取る。
    //タイトルに対応づけて返信をreplyテーブルに保存
    $explode_data=$_POST["reply_data"];
    $reply_data = explode(",",$explode_data);//返信先タイトル

    $reply = $_POST["reply"];//返信内容
    $reply_user = $_SESSION["user"]["student_name"];//返信者のユーザ名用のカラムを追加する

    //投稿者の名前追加部分が未完成
    $sql = "INSERT INTO reply(title,post_user_name,name,reply) VALUES(:title,:post_user_name,:name,:reply)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":title" => $reply_data[0],":post_user_name"=>$reply_data[1],":name"=>$reply_user,":reply" => $reply]);
    header("Location:board.php");


?>