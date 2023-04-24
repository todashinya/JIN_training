<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題3_回答</title>
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

    foreach($data as $d) {
        if($d['input_answer'] == '') {
            echo "問{$d['display_num']}" . '<p class="error__msg">' . 'フォームに値を入力してください' .  '</p>';
        } else if(!is_numeric($d['input_answer'])) {
            echo "問{$d['display_num']}" . '<p class="error__msg">' . 'フォームに数値を入力してください' .  '</p>';
        } else {
            if($d['correct_answer'] == $d['input_answer']) {
                echo "問{$d['display_num']}" . "<p>「{$d['correct_answer']}」正解です！！</p>";
            } else {
                echo "問{$d['display_num']}" . "<p>残念！！正解は「{$d['correct_answer']}」です</p>";
            }
        } 
    }
}

?>

</body>
</html>