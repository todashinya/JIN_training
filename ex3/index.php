<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題3</title>
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
                //0除算が起きないようにする
                if($b == 0) {
                    $b = rand(1,100);
                }
                //小数第三位を四捨五入して計算
                $answer = round(($a / $b), 3);
            break;
        }

        $dataList[] = array(
            'formula' => $formula,
            'answer' => $answer,
        );

    }
?>

<div>
    <p>問3） 問1の応用として、下記例外処理を実装してください。</p>
    <ul>
        <li>数字以外が入力された場合、エラー表示してください。</li>
        <li>0で割ったときは、エラー表示してください。例）3 / 0 ⇒&emsp;エラー</li>
        <li>割り算で小数点が発生した場合、小数第三位を四捨五入して正誤判定を行ってください。</li>
    </ul>   
</div>

<form action="./answer.php" method="POST">
    <?php 
        for($i=0; $i < $questionsCnt; $i++){
            $display_num = $i + 1;
            echo "問{$display_num}" . '<p>' . $dataList[$i]['formula'] . ' = ' . "<input type='text' name='data[$i][input_answer]' value=''>" . '</p>';
            echo "<input type='hidden' name='data[$i][correct_answer]' value='{$dataList[$i]['answer']}'>";
            echo "<input type='hidden' name='data[$i][display_num]' value='{$display_num}'>";
        }
    ?>

    <button type="submit">答え合わせする</button>
</form>
    
</body>
</html>