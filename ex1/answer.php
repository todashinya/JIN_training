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
    if($data['calc_answer'] == $data['input_answer']) {
        echo "<p>「{$data['calc_answer']}」正解です！！</p>";
    } else {
        echo "<p>残念！！正解は「{$data['calc_answer']}」です</p>";
    }
?>

    
</body>
</html>

