<?php
    require_once "components/connect.php";
    require_once "components/functions.php";
    require_once('../Components/user_check.php');


    $logs=[];

    if(empty($_SESSION["errors"])){
        $_SESSION["errors"]=[
            "title" => "",
            "text" => ""
        ];

    }
    $titles = get_title($pdo);  

    $current_index =max_id($pdo);

    if($current_index<0){
        $current_index=0;
    }
    //直近10件を表示
    $stmt = get_posts($pdo,$current_index);

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
<script src ="../../../js/jquery-3.6.0.min.js"></script>
<body class="bg-lsBlue">
    <div class="row M_bottom-5 defBarColor">
    <h1 class="title_pos"><a href="../index.php">掲示板</a></h1>
    </div>

    <div class="container mt-5">

    <h3 class="mb-5">   <span class ="spinner-grow text-info"></span>直近の投稿(最大10件まで表示)</h3>
        <div class ="textview board_color">

            <div class ="post card">
                <ul class="list-group">
                    <?php foreach($logs as $value):?>
                            
                        <li class="list-group-item pb-5">
                            <span><span class="ml-5 float-right board_date"><?=$value["date"]?></span><span class="name_pos">投稿者:<?=$value["name"]?></span></span>
                            <div>
                                <label class="board_title marl-5p"><?=$value["title"]?></label>
                            </div>
                                <span class="board_text marl-5p"><?=$value["text"]?></span>

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


        <div class="float-right">
            <p class="mt-5"><a href="board_log.php">全ての投稿を見る</a></p>
            
        </div>




        <div class="forms">
            <div class="post_form">
                <form action="update.php" method="post" class ="mar_t10">
                    <div id="mar_t10" class="alert-primary pb-sm-1 pt-sm-5 mb-4 border_radius">
                        <h4 class="mb-5 ml-5">掲示板に投稿</h4>
                        <div class="contents">
                            <div class="marl-10p">
                                <label for="title">タイトル</label>

                                <span style="color:red;" class ="mar-lef4e"><?=$_SESSION["errors"]["title"]?></span>

                                <textarea name="title" id="title" cols="20" rows="1" class="form-control" style="width:30%;" name="username"></textarea><br>
                            </div>
                            <div class="marl-10p" style="width:100%;">
                                <label for="text">投稿内容</label>
                                <span style="color:red;" class ="mar-lef4e"><?=$_SESSION["errors"]["text"]?></span>
                                <textarea rows="8" cols="20"  type="text" name="text" maxlength="80" class=" inputConfig form-control" id="text" style="width:80%;"></textarea>
                            </div>


                        </div>
                        <button type="submit" class="mt-3 mar_b3 btn btn-info btn-pos btn-block marl-10p mt-5" name="btn" style="width:80%;" id ="board_submit" onclick="return input_confirm()">送信</button>

                    </div>
                </form>
            </div>


            <div class="reply_form">
                <form action="board_reply.php" method="post" class ="mar_t10">
                    <div id="mar_t10" class="alert-primary pb-sm-1 pt-sm-5 mb-4 border_radius">
                        <h4 class="mb-5 ml-5">投稿に返信</h4>
                        <div class="contents">
                            <div class="marl-10p">
                                <label for="title">タイトル</label>

                                <div>
                                <select name="reply_data" id="">
                                <!--タイトルタグを使って投稿を管理-->

                                <?php foreach($titles as $title):?>
                                    <option value='<?=$title["title"]?>,<?=$title["name"]?>'>投稿者:<?=$title["name"];?>　タイトル:<?=$title["title"]?></option>
                                <?php endforeach;?>
                                
                                </select>

                                </div>
                                <br>
                            </div>
                            <div class="marl-10p" style="width:100%;">
                                <label for="text">投稿内容</label>
                                <span style="color:red;" class ="mar-lef4e"><?=$_SESSION["errors"]["text"]?></span>
                                <textarea rows="8" cols="20"  type="text" name="reply" maxlength="80" class=" inputConfig form-control" id="text" style="width:80%;"></textarea>
                            </div>


                        </div>
                        <button type="submit" class="mt-3 mar_b3 btn btn-info btn-pos btn-block marl-10p mt-5" name="btn" style="width:80%;" id ="board_submit" onclick="return input_confirm()">送信</button>

                    </div>
                </form>
            </div>
        </div>
        <button type="button" class="mt-3 mar_b3 btn btn-info btn-pos btn-block  mt-5 form_btn">投稿返信切替</button>
    </div>

</body>

    <script src="../../../js/check.js"></script>
    <script src="../../../js/exe.js"></script>
    <script src ="../../../js/functions.js"></script>
</html>