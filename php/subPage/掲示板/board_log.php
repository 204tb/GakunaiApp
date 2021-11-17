<?php
    require_once "components/connect.php";
    require_once "components/functions.php";
    session_start();
    $logs_all =[];
    $posts_10 = [];//投稿を10件格納する配列
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
    //$_SESSIONに登録することでシリアル化エラーが出る(後で修正)
    $post_all = get_post_all($pdo);//投稿を全て取得して、セッションに登録
    $data_count = get_count($pdo);//投稿数を取得(削除済み投稿を含まない)


    while($data =$post_all->fetch()){
        $logs_all[]=$data;
    }

    for($i = $paging_id;$i< $paging_id+10;$i++){//10件取得
        if($logs_all[$i]["delete_flag"] ==1){//削除済み投稿であればスキップ
            continue;
        }
        $posts_10[] = $logs_all[$i];//全ての投稿から10件取得
        if($i==$data_count[0]-1){
            break;
        }
    }   



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

<h3 class="mb-5">過去投稿一覧　　<?=$current_page?>ページ目</h3>
    <!--古い順に表示-->
    <div class ="textview board_color">
        <!--ページング処理を追加する-->
        <div class ="post card">
            <ul class="list-group">
                <?php foreach($posts_10 as $value):?>
                        
                    <li class="list-group-item pb-5">
                        <span><span class="ml-5 float-right board_date"><?=$value["date"]?></span><span class="name_pos">投稿者:<?=$value["name"]?></span></span>
                        <div>
                            <label class="board_title marl-5p"><?=$value["title"]?></label>
                        </div>
                            <span class="board_text marl-5p"><?=$value["text"]?></span>
                        <!--リプライを取得-->
                        <?php $reply = get_reply($pdo,$value["title"],$value["name"],$value["date"]);?>
                            <!--$replyから　日付を取得して投稿を区別-->

                            <!--投稿に返信がある場合表示する-->
                            <?php if(is_array($reply) && count($reply) >0):?>
                                <!--ボタンのnameを定義-->
                                <?php $date = new DateTime($value["date"]);
                                      $str_date = $date->format("Y-m-d-H-i-s");//string型に変換
                                ?>
                                <?php $btn_name = "reply_chack".$value["title"].$value["name"].$str_date?><!--返信用のボタンを追加-->
                                <?php $reply_name = "reply".$value["title"].$value["name"].$str_date?>

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

                                    $(".<?=$reply_name?>").hide();//返信を隠す  
                                    $(".<?=$btn_name?>").click(function(){//
                                        $(".<?=$reply_name?>").toggle(450);//表示非表示を切替
                                    });

                                </script>
                            <?php endif;?>



                    </li>

                    <?php endforeach;?>
            </ul>

        </div>


    </div>
    </div>

    <?php $previous = ($current_page-1);$next =($current_page+1);
    if($previous<1){
        $previous =1;
    }
    if($next>$page_numbers){
        $next = $page_numbers;
    }
    
    
    $page_start=$current_page-2;//現在のページの2個前まで
    $page_amount = $current_page+2;//現在のページから2つ後まで
 
    if($page_start<1){
        $page_start=1;
    }
    if($page_amount>$page_numbers){
        $page_amount=$page_numbers;
    }
    //不足ページを追加
    if($current_page==1){
        $page_amount=$current_page+4;
    }
    if($current_page==2){
        $page_amount=$current_page+3;
    }
    if($current_page==3){
        $page_amount=$current_page+2;
    }
    
    //不足ページを追加
    if($current_page==$page_numbers){
        $page_start=$page_numbers-4;
    }
    if($current_page==$page_numbers-1){
        $page_start=$page_numbers-4;
    }
    if($current_page==$page_numbers-2){
        $page_start=$page_numbers-4;
    }
?>
            <div class="reply_form container">
                <form action="board_reply.php" method="post" class ="mar_t10">
                    <div id="mar_t10" class="alert-primary pb-sm-1 pt-sm-5 mb-4 border_radius">
                        <h4 class="mb-5 ml-5">投稿に返信</h4>
                        <div class="contents">
                            <div class="marl-10p">
                                <label for="title">タイトル</label>

                                <div>
                                <select name="reply_data" id="">
                                <!--タイトルタグを使って投稿を管理-->

                                <?php foreach($posts_10 as $title):?>
                                    <option value='<?=$title["title"]?>,<?=$title["name"]?>,<?=$title["date"]?>'>投稿者:<?=$title["name"];?>　タイトル:<?=$title["title"]?>　日時:<?=$title["date"]?></option>
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
    <div class="mt-5 pagination container d-flex justify-content-center">
        <?php echo '<button class="btn btn-primary mr-5 mb-3 page-item"><a href ="./board_log.php?page_num='.($previous).'" style="color:white;">'."前へ".'</a></button>'?>
        <div class="buttons" style="text-align: center;">
            <?php for($i=$page_start;$i<=$page_amount;$i++){

                echo '<button class="btn btn-primary mr-5 mb-3 page-item"><a href ="./board_log.php?page_num='.$i.'" style="color:white;">'.$i.'</a></button>';
            }
            ?>
        </div>

        <?php echo '<button class="btn btn-primary mr-2 mb-3 page-item "><a href ="./board_log.php?page_num='.($next).'" style="color:white;">'."次へ".'</a></button>'?>
    </div>


</body>
</html>