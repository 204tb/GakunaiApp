<?php

require_once('../Components/user_check.php');

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
<body class="bg-lsBlue">
    <h1 class ="title"><a href="../index.php">学内アプリ</a></h1>
    <?php include("../Components/contens.php")?>
    <div class="container">
        <div id="contents4" class ="contents">
            <h3 id="Resevation"class="subTitle_fadein">学内PCの予約</h3>
                <p>未実装</p>
            <button type="submit" class ="Reservation_button btn btn-outline-primary">予約する</button>
        </div>
    </div>
</body>
</html>