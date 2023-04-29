<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題6</title>
</head>

<body>
    <?php
        require_once './class/QuestionClass.php';
        $obj = new QuestionClass;
        $obj->createQuestion();
    ?>
    <form action="./answer.php" method="POST">
        <?php
            for ($i = 0; $i < $obj->questionsCnt; $i++) {
                $display_num = $i + 1;
                echo "問{$display_num}" . '<p>' . $obj->dataList[$i]['formula'] . ' = ' . "<input type='text' name='data[$i][input_answer]' value=''>" . '</p>';
                echo "<input type='hidden' name='data[$i][correct_answer]' value='{$obj->dataList[$i]['answer']}'>";
                echo "<input type='hidden' name='data[$i][display_num]' value='{$display_num}'>";
            }
            echo "<input type='hidden' name='startTime' value='{$obj->startDateTime}'>";
            ?>
        <button type="submit">答え合わせする</button>
    </form>

</body>

</html>