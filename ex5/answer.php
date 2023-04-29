<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題5_回答</title>
    <style>
        .error__msg {
            color: red;
        }
    </style>
</head>
<body>
<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = $_POST['data'];
    $startTime = $_POST['startTime'];

    //終了時間
    $objDateTime = new DateTime();
    $endTime = $objDateTime->getTimestamp();

    //正解数カウント
    $questionsCnt = 10;
    $correctAnswerCnt = 0;
    $wrongAnswerCnt = 0;

    foreach($data as $d) {
        if($d['input_answer'] == '') {
            echo "問{$d['display_num']}" . '<p class="error__msg">' . 'フォームに値を入力してください' .  '</p>';
        } else if(!is_numeric($d['input_answer'])) {
            echo "問{$d['display_num']}" . '<p class="error__msg">' . 'フォームに数値を入力してください' .  '</p>';
        } else {
            if($d['correct_answer'] == $d['input_answer']) {
                echo "問{$d['display_num']}" . "<p>「{$d['correct_answer']}」正解です！！</p>";
                $correctAnswerCnt ++;
            } else {
                echo "問{$d['display_num']}" . "<p>残念！！正解は「{$d['correct_answer']}」です</p>";
                $wrongAnswerCnt ++;
            }
        } 
    }

    //回答までの時間計算
    $calculationTime =  ($endTime - $startTime);

    //正解率計算
    $correctAnswerRate = round(($correctAnswerCnt / $questionsCnt) * 100, 1);

    echo '回答までに' . $calculationTime . '秒かかりました。';
    echo '正解率は' . $correctAnswerRate . '%';
}

?>

</body>
</html>