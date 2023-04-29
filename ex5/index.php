<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題5</title>
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
    <p>問5） 問4の応用として、下記例外処理を実装してください。</p>
    <ul>
        <li>開始ボタンを押下したら、問題が出題されるようにしてください。</li>
        <li>回答までの時間を計測して、答え合わせのページに表示してください。</li>
        <li>何問正解したか表示してください。</li>
    </ul>   
</div>

<form action="./question.php" method="POST">
    <button type="submit">開始</button>
</form>
    
</body>
</html>