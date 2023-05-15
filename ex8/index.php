<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題8</title>
    <style>
        button {
            display: block;
            margin-top: 20px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div>
        <p>問8） 問6の応用として、下記の処理を実装してください。</p>
        <ul>
            <li>
                トップページで問題形式の選択を可能としてください。<br>
                <span>例）全て、足し算、引き算、掛け算、割り算</span>
            </li>
        </ul>
    </div>

    <form action="./question.php" method="POST">
        <div class="calctype">
            <input type="radio" name="calctype" value="0" checked><label for="">全て</label>
            <input type="radio" name="calctype" value="1"><label for="">足し算</label>
            <input type="radio" name="calctype" value="2"><label for="">引き算</label>
            <input type="radio" name="calctype" value="3"><label for="">掛け算</label>
            <input type="radio" name="calctype" value="4"><label for="">割り算</label>
        </div>
        <div class="questionNum">
            <div><label for="">最小値:</label><input type="text" name="min" value="1" id=""></div>
            <div><label for="">最大値:</label><input type="text" name="max" value="100" id=""></div>
            <div><label for="">問題数:</label><input type="text" name="questionNum" value="10" id=""></div>  
        </div>
        <button type="submit">開始</button>
    </form>

</body>

</html>