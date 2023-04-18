<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題2</title>
    <style>
        button {
            display: block;
            margin-top: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
    //10問作成
    $questionsCnt = 10;
    $dataList = array();

    for($i=0; $i < $questionsCnt; $i++){
        // 乱数生成
        $a = rand(0,100);
        $b = rand(0,100);
        $array = ['+', '-', '÷', '×'];
        $arrayIndex = array_rand($array);
        $operator = $array[$arrayIndex];
        $formula = "$a $operator $b";

        // 演算子に応じて計算結果を出力
        switch($operator) {
            case '+':
                $answer = $a + $b;
            break;
            case '-':
                $answer = $a - $b;
            break;
            case '×':
                $answer = $a * $b;
            break;
            case '÷':
                $answer = $a / $b;
            break;
        }

        $dataList[] = array(
            'formula' => $formula,
            'answer' => $answer
        );
    }
?>

<p>
    問2） 四則演算の出題を自動生成し画面に表示させます。<br>
    ユーザが回答を入力し、回答ボタン押下して正誤判定を行ってください。<br>
    ※非同期はなしとする。<br>
</p>

<form action="./answer.php" method="POST">
    <?php 
        for($i=0; $i < $questionsCnt; $i++){
            echo '<p>' . $dataList[$i]['formula'] . ' = ' . "<input type='number' name='data[$i][input_answer]' value=''>" . '</p>';
            echo "<input type='hidden' name='data[$i][correct_answer]' value='{$dataList[$i]['answer']}'>";
        }
    ?>
    <button type="submit">答え合わせする</button>
</form>
    
</body>
</html>

