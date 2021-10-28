<?php

require_once('../Components/user_check.php');

//ボタン処理
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['attendance'])) {
        header('Location: attendance.php');
        exit;
    } else if(isset($_POST['leave_early'])) {
        header('Location: leave_early.php');
        exit;
    } else if(isset($_POST['attendance_rate'])){
        header('Location: attendance_rate.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/sample.css">
    <title>マイページ</title>
</head>
<body class="bg-lsBlue">
        <div class="row M_bottom-5 defBarColor mb-5">
        <h2 class="title_pos nav_white"><?= $user["student_name"] ?>のマイページ</h2>
        <span class="pos_R"><a href="../index.php" class="nav_white">サイト機能一覧へ</a></span><!--右寄せにする-->
        </div>
        <div style="text-align:center;top:30%;">
            <table>
                <th>クラス</th>
                <th>生徒番号</th>
                <tr>
                    <td><?= $user['classes_id']?></td>
                    <td><?= $user['student_id']?></td>
                </tr>
            </table>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>



    <div class="container">
    <form action="" method="post">
        <div class="btn-group" style="width:100%;">
        <button class="w-50 btn btn-lg btn-primary btn-block" name="attendance" onClick="return confirm('出席しますか?')">出席</button>
        <button class="w-50 btn btn-lg btn-danger" name="leave_early"onClick="return confirm('早退しますか?')">早退</button>
        <button class="w-50 btn btn-lg btn-success" name="attendance_rate">出席率</button>
        </div>

    </form>
    </div>
</body>
</html>