<?php
    require_once "components/connect.php";
    session_start();
    //POSTデータからタイトルと返信を受け取る。
    //タイトルに対応づけて返信をreplyテーブルに保存
    //返信先の日付を取得する処理を追加
    $explode_data=htmlspecialchars($_POST["reply_data"]);
    $reply_data = explode(",",$explode_data);//返信先タイトルと名前と日付

    $reply = htmlspecialchars($_POST["reply"]);//返信内容
    $reply_user = htmlspecialchars($_SESSION["user"]["student_name"]);//返信者のユーザ名用のカラムを追加する
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

    $sql = "INSERT INTO reply(title,post_user_name,name,reply,distinationDate) VALUES(:title,:post_user_name,:name,:reply,:distinationDate)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":title" => $reply_data[0],":post_user_name"=>$reply_data[1],":name"=>$reply_user,":reply" => $reply, ":distinationDate" => $reply_data[2]]);
    if(isset($_SESSION["current_page"])){
        $_SESSION["current_page"]="";
        header("Location:board_log.php");
    }else{
        header("Location:board.php");
    }



?>