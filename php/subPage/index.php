<?php
session_start();

if(!empty($_SESSION["user"])){
    $user =$_SESSION["user"];
}else{
    header('Location: error_page.php');
    exit;      
}
    if(isset($_SESSION["errors"])){
        unset($_SESSION["errors"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/sample.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>サイトメニュー</title>
</head>

<body class="bg-lsBlue">
    
    <div class="row M_bottom-5 defBarColor header_pos">
        <h1 style="color:white; padding-left:4%;">学内アプリ</h1>
        <a href="出席管理/my_page.php" class="itembar">出席管理</a>
        <a href="時間割/Timeable.php" class="itembar">時間割</a>
        <a href="掲示板/board.php" class="itembar">掲示板</a>
        <!--<a href="subPage/学内PC予約/Resevation.php" class="itembar">PC予約</a>-->
        <span class="pos_R nav_white">ログイン中：<?=$user["student_name"]?></span>
        <span class="pos_R mar_t2"><a href="sign_out.php">サインアウト</a></span>
    </div>

    <div class="container"> 

            <div id="contents1" class ="contents">
                <h3 id="Attendance_rate"class="subTitle_fadein">出席管理</h3><!--#Attendance_rate,#Timeable,#Bulletin_board,#Resevation-->
                <p>マイページで出席に関する機能が使用できます。</p>
                <div class="explanation">
                    <span id="explanation_title" class="explanation_title_attendancerate mar-lef4e">機能について</span>
                    <div class="explanation_text_attendancerate" id="explanation_text">
                        <p>現在の学期の出席率を確認できます。</p>
                        <p>また、マイページのボタンから出席と早退をすることが出来ます。</p>
                    </div>
                </div>

                <button class ="Attendance_rate_button btn btn-primary"><a href="出席管理/my_page.php" class="color-white" style="color:white;">マイページへ</a></button>
            </div>
            <div id="contents2" class ="contents">
                <h3 id="Timeable"class="subTitle_fadein2">時間割</h3>
                <p>今学期の出席率を確認出来ます。</p>
                <div class ="explanation">
                    <span id="explanation_title" class="explanation_title_time mar-lef4e">機能について</span>
                    <div class="explanation_text_time" id="explanation_text">
                        <p>現在所属しているクラスの時間割が閲覧可能です。</p>
                    </div>
                </div>
                <button class ="Timetable_button btn btn-primary"><a href="時間割/Timeable.php" class="color-white" style="color:white;">時間割確認へ<a></button>
            </div>
    
            <div id="contents3" class ="contents">
                <h3 id="Bulletin_board"class="subTitle_fadein3">掲示板</h3>
                <p>掲示板です。</p>
                <div class ="explanation">
                    <span id="explanation_title" class="explanation_title_board mar-lef4e">機能について</span>
                    <div class="explanation_text_board" id="explanation_text">
                        <p>タイトルと160字以内の文章を投稿できる掲示板です。投稿内容は直近10件まで確認することが出来ます。</p>
                        <p>過去の投稿内容全ては別ページから全て確認することが出来ます。</p>
                    </div>
                </div>

                <button type="submit" class ="Bulletin_board_button btn btn-primary"><a href="掲示板/board.php" style="color:white;">掲示板へ</a></button>
            </div>
            <p><a href="Components/nav.php">テスト用</a></p>
    </div>
</body>

    <script src ="../../js/jquery-3.6.0.min.js"></script>
    <script src ="../../js/exe.js"></script>  

</html>