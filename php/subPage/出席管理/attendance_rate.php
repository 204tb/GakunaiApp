<?php
//タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

//DB接続
require_once('../Components/connect.php');
//ユーザーのログイン状態をチェック
require_once('../Components/user_check.php');

//pdo変数
$pdo_attendance = Attendance();

//出席率データを取得
$attendance_rate = Get_Attendance_rate($pdo_attendance,$user);

var_dump($attendance_rate);

//1週間以内の出席率データを教科ごとに1つずつ取得
function Get_Attendance_rate($pdo,$user)
{        
    try{
        $sql = "SELECT * FROM attendance_rate
                WHERE DATE_FORMAT(update_time, '%Y-%m-%d') >= (DATE_FORMAT(now(), '%Y-%m-%d') - INTERVAL 7 DAY)
                AND students_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($user['student_id']));
        $attendance_rate = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $attendance_rate;
    }catch (PDOException $e) {
        header('../error_page.php');
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
    <title>出席率</title>
</head>
<body>
    <h1>aiueo</h1>
</body>
</html>