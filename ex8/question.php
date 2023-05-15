<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題8</title>
</head>

<body>
    <?php
        //クラス読み込み
        require_once './class/QuestionClass.php';

        //インスタンス化
        $obj = new QuestionClass;
        $questions = $obj->createQuestion();

        //開始時間
        $objDateTime = new DateTime();
        $startDateTime = $objDateTime->getTimestamp();
    ?>

    <form action="./answer.php" method="POST">
        <?php
            foreach ($questions as $question) {
                echo "問{$question['display_num']}" . '<p>' . $question['formula'] . ' = ' . "<input type='text' name='data[{$question['display_num']}][input_answer]' value=''>" . '</p>';
                echo "<input type='hidden' name='data[{$question['display_num']}][correct_answer]' value='{$question['answer']}'>";
                echo "<input type='hidden' name='data[{$question['display_num']}][display_num]' value='{$question['display_num']}'>";
            }
            echo "<input type='hidden' name='startTime' value='{$startDateTime}'>";
        ?>
        <button type="submit">答え合わせする</button>
    </form>

</body>

</html>