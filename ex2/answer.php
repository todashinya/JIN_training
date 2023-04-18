<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題1_回答</title>
</head>
<body>
<?php
    $data = $_POST['data'];

    foreach($data as $d) {
        if($d['correct_answer'] == $d['input_answer']) {
            echo "<p>「{$d['correct_answer']}」正解です！！</p>";
        } else {
            echo "<p>残念！！正解は「{$d['correct_answer']}」です</p>";
        }
    }
?>

</body>
</html>

