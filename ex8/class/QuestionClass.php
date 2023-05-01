<?php

class QuestionClass {

    public $startDateTime;
    public $questionsCnt;
    public $dataList;

    /**
     * ランダムで計算問題を作成する
     */

    function createQuestion() {
        //開始時間
        $objDateTime = new DateTime();
        $this->startDateTime = $objDateTime->getTimestamp();

        //POSTされた「問題数」に応じて問題作成
        $questionNum = $this->questionNumberCheck();
        $this->questionsCnt = $questionNum;

        //POSTされた「最小値」「最大値」に応じて問題作成
        $min = $this->minNumberCheck();
        $max = $this->maxNumberCheck();

        //配列初期化
        $this->dataList = array();

        for ($i = 0; $i < $this->questionsCnt; $i++) {
            // 乱数生成
            $a = rand($min, $max);
            $b = rand($min, $max);

            // 出題形式のチェック
            $calcTypeFlag = $this->calcTypeCheck();

            // 出題形式に応じて演算子を決定
            if($calcTypeFlag == 1) {
                $operator = '+';
            } else if($calcTypeFlag == 2) {
                $operator = '-';
            } else if($calcTypeFlag == 3) {
                $operator = '×';
            } else if($calcTypeFlag == 4) {
                $operator = '÷';
            } else {
                $array = ['+', '-', '÷', '×'];
                $arrayIndex = array_rand($array);
                $operator = $array[$arrayIndex];
            }

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
                    if ($a === 0) {
                        // $a = rand(1, $max);
                        $a = 100;
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

    /**
     * index.phpからPOSTされた値をもとに、出題形式を返却する
     * 0 全ての出題形式
     * 1 足し算のみ
     * 2 引き算のみ
     * 3 掛け算のみ
     * 4 割り算のみ
     */
    function calcTypeCheck() {
        $calctype = $_POST['calctype'] ?? 0;
        return $calctype;
    }

    /**
     * index.phpからPOSTされた値をもとに、出題数の最小値を返却する
     */
    function minNumberCheck() {
        $min = $_POST['min'] ?? 0;
        return $min;
    }

    /**
     * index.phpからPOSTされた値をもとに、出題数の最大値を返却する
     */
    function maxNumberCheck() {
        $max = $_POST['max'] ?? 100;
        return $max;
    }

    /**
     * index.phpからPOSTされた値をもとに、出題数を返却する
     */
    function questionNumberCheck() {
        $questionNum = $_POST['questionNum'] ?? 10;
        return $questionNum;
    }
}