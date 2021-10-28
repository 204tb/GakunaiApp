<?php
//投稿データの取得
    function get_posts($pdo,$offset){
        $sql = "SELECT * FROM userlog ORDER BY id ASC LIMIT 10 OFFSET {$offset}";
        $stmt=$pdo->query($sql);
        return $stmt;
    }
    //投稿データの取得(降順)
    function get_posts_desc($pdo,$offset){
        $sql = "SELECT * FROM userlog ORDER BY id DESC LIMIT 10 OFFSET {$offset}";
        $stmt=$pdo->query($sql);
        return $stmt;
    }

    //idの最大の10個前を取得する関数
    function max_id($pdo){
        $sql = "SELECT max(id) AS id FROM userlog";
        $stmt=$pdo->query($sql);
        $max_id =$stmt->fetch();
        return $max_id["id"]-10;//最大値から表示件数の10を引く
    }
    
    function get_title($pdo){
        //投稿の中からタイトルのみを全て取得(重複は省く)
        $sql = "SELECT name,title from userlog";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }

    function get_reply($pdo,$title,$name){
        //受け取ったタイトルがreplyテーブルにあれば返信を取得
        $sql = "SELECT * from reply WHERE :title = title AND :post_user_name = post_user_name";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":title" => $title,":post_user_name" => $name]);
        return $stmt->fetchAll();
    }
?>