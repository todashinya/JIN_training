<?php

class QuestionClass {

    public $startDateTime;
    public $questionsCnt;
    public $dataList;

    function createQuestion() {
        //開始時間
        $objDateTime = new DateTime();
        $this->startDateTime = $objDateTime->getTimestamp();

        //10問作成
        $this->questionsCnt = 10;
        $this->dataList = array();

        for ($i = 0; $i < $this->questionsCnt; $i++) {
            // 乱数生成
            $a = rand(0, 100);
            $b = rand(0, 100);
            $array = ['+', '-', '÷', '×'];
            $arrayIndex = array_rand($array);
            $operator = $array[$arrayIndex];

            // 演算子に応じて計算結果を出力
            switch ($operator) {
                case '+':
                    $answer = $a + $b;
                    break;

                case '-':
                    // 条件1:負の解にならない問題作成
                    $b = rand(0, $a);
                    // 条件1:END
                    $answer = $a - $b;
                    break;

                case '×':
                    $answer = $a * $b;
                    break;

                case '÷':
                    // 条件2:0除算が起きないようにする
                    if ($b == 0) {
                        $b = rand(1, 100);
                    }
                    // 条件2:END

                    // 条件3:割り算の解が小数点にならないようにする
                    if ($a % $b != 0) {
                        $a = floor($a / $b) * $b;
                    }
                    // 条件3:END

                    // 条件4:小数第三位を四捨五入して計算
                    $answer = round(($a / $b), 3);
                    // 条件4:END
                    break;
            }

            //画面表示用の式を作成
            $formula = "$a $operator $b";

            $this->dataList[] = array(
                'formula' => $formula,
                'answer' => $answer,
            );
        }
    }
}
