<?php

class QuestionClass {


    private $__questionNum = 10;

    private $__min = 0;

    private $__max = 100;

    private $__calctype = 0;

    
    /**
     * ランダムで計算問題を作成する
     */
    public function createQuestion() {

        //配列初期化
        $this->dataList = array();

        for ($i = 0; $i < $this->__questionNum; $i++) {
            // 乱数生成
            $a = rand($this->__min, $this->__max);
            $b = rand($this->__min, $this->__max);

            
            // 出題形式のチェック
            // 出題形式に応じて演算子を決定
            if($this->__calctype == 1) {
                $operator = '+';
            } else if($this->__calctype == 2) {
                $operator = '-';
            } else if($this->__calctype == 3) {
                $operator = '×';
            } else if($this->__calctype == 4) {
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
                    if ($a < $b) {
                        $tmp = $a;
                        $a = $b;
                        $b = $tmp;
                    }
                    $answer = $a - $b;
                    // 条件1:END
                    break;
                case '×':
                    $answer = $a * $b;
                    break;
                case '÷':
                    // 条件2:0除算が起きないようにする
                    if ($a == 0) {
                        $a = rand(1, $this->__max);
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
                'display_num' => $i + 1,
            );

        }
        
        return $this->dataList;
    }

    /**
     * index.phpからPOSTされた値をもとに、出題形式を返却する
     * 0 全ての出題形式
     * 1 足し算のみ
     * 2 引き算のみ
     * 3 掛け算のみ
     * 4 割り算のみ
     */
    public function setCalcType($val) {
        return $this->__calctype = $val;
    }

    /**
     * index.phpからPOSTされた値をもとに、出題数の最小値を返却する
     */
    public function setMinNumber($val) {
        return $this->__min = $val;
    }

    /**
     * index.phpからPOSTされた値をもとに、出題数の最大値を返却する
     */
    public function setMaxNumber($val) {
        return $this->__max = $val;
    }

    /**
     * index.phpからPOSTされた値をもとに、出題数を返却する
     */
    public function setQuestionNumber($val) {
        return $this->__questionNum = $val;
    }
}