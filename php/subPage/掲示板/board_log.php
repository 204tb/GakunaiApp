<?php
    require_once "components/connect.php";
    require_once "components/functions.php";
    session_start();
    $logs=[];
    $PAGE_MAX=10;
    $now_data_max =max_id($pdo)+10;//現在の最大idの取得
    $page_numbers =ceil($now_data_max/10);

    //現在のページの取得
    if(!isset($_GET["page_num"])){
        $current_page=1;
    }else{
        $current_page=$_GET["page_num"];
    }
    $paging_id = (($current_page-1)*$PAGE_MAX);//開始indexの作成


    
    //直近10件を降順で表示
    $stmt = get_posts($pdo,$paging_id);

    while($data =$stmt->fetch()){
        $logs[]=$data;
    }
    krsort($logs);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/sample.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Document</title>
</head>
<?php include("../Components/load_js.php")?>
<?php include("../Components/nav.php")?>

<script src ="../../../js/jquery-3.6.0.min.js"></script>
<body class="bg-lsBlue">

    <div class="container mt-5">

<h3 class="mb-5">過去投稿一覧</h3>
    <!--古い順に表示-->
    <div class ="textview board_color">
        <!--ページング処理を追加する-->
        <div class ="post card">
            <ul class="list-group">
                <?php foreach($logs as $value):?>
                        
                    <li class="list-group-item pb-5">
                        <span><span class="ml-5 float-right board_date"><?=$value["date"]?></span><span class="name_pos">投稿者:<?=$value["name"]?></span></span>
                        <div>
                            <label class="board_title marl-5p"><?=$value["title"]?></label>
                        </div>
                            <span class="board_text marl-5p"><?=$value["text"]?></span>
                        <!--リプライを取得-->
                        <?php $reply = get_reply($pdo,$value["title"],$value["name"]);?>


                        <!--投稿に返信がある場合表示する-->
                        <?php if(is_array($reply) && count($reply) >0):?>
                            <!--ボタンのnameを定義-->
                            <?php $btn_name = "reply_chack".$value["title"].$value["name"]?>
                            <?php $reply_name = "reply".$value["title"].$value["name"]?>
                            <div class="<?=$reply_name?> text-left list-group-item">
                                <?php foreach($reply as $rp):?>
                                            <p class="mb-1">返信者:<?=$rp["name"]?></p>
                                            <p class="ml-5"><?=$rp["reply"]?></p>
                                            <p class="mt-1"><?=$rp["date"]?></p>
                                            <p style="border-bottom: 0.01em solid black;"></p>
                                <?php endforeach;?>                                   
                            </div>
                            <button class="<?=$btn_name?> float-right btn btn-primary mt-2">返信一覧</button>
                            <script>
                                $(".<?=$reply_name?>").hide();
                                $(".<?=$btn_name?>").click(function(){
                                    $(".<?=$reply_name?>").toggle();
                                });
                            </script>
                        <?php endif;?>



                    </li>

                    <?php endforeach;?>
            </ul>

        </div>


    </div>
    <div class="mt-5 pagination">
        <?php for($i=1;$i<=$page_numbers;$i++){
            echo '<button class="btn btn-primary mr-1 page-item"><a href ="./board_log.php?page_num='.$i.'" style="color:white;">'.$i.'</a></button>';
        }
        ?>
    </div>
    </div>


</body>
</html>