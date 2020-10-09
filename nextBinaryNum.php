<?php
Class BinaryNumTask
{
    public $num1 = [1, 0];
    public $num2 = [1, 1];
    public $num3 = [1, 1, 0];
    public $num4 = [1,0,0,0,0,0,0,0,0,1];
    public $num5 = [1,1,1,0];
    public $num6 = [1,0,0,1];
    public $num7 = [1, 1, 1];

    public function nextBinaryNum(){
        $this->outputBinaryNum($this->num1);
        $this->outputBinaryNum($this->num2);
        $this->outputBinaryNum($this->num3);
        $this->outputBinaryNum($this->num4);
        $this->outputBinaryNum($this->num5);
        $this->outputBinaryNum($this->num6);
        $this->outputBinaryNum($this->num7);
    }

    private function generateNextBinaryNum(array $num, int $loopTag=0){
        if($loopTag == 0) {
            return $this->normalNextBinary($num);
        } else {
            return $this->specialNextBinary($num, $loopTag);
        }
    }

    private function specialNextBinary(array $num, int $tag){
        for($i=count($num)-1; $i>=0; $i--) {
            $i == 0 ? $num[$i] = $tag : $num[$i+1] = 0;
        }
        return $num;
    }

    private function normalNextBinary(array $num){
        $tag = 0;
        for($i=count($num)-1; $i>=0; $i--) {
            if($num[$i] == 0 && $i == (count($num) - 1)){//For all binary which the last number is 0.
                $num[$i] = 1;
            } else {
                if( $num[$i] == 1 && ( $i == (count($num) - 1) || $tag == 1) ) {//For all binary which the last number is 1.
                    $tag = 1;
                    $num[$i] = 0;
                } elseif($num[$i] == 0 && $tag == 1) {
                    $num[$i] = $tag;
                    $tag = 0;
                } elseif($i == 0 && $tag == 1){//For the first number
                    $tag = 1;
                    $num[$i] = 0;
                } else {
                    $num[$i] = $num[$i];
                }
            }
        }

        return $tag == 0 ? $num : $this->generateNextBinaryNum($num, $tag);
    }

    private function outputBinaryNum(array $num){
        print_r($this->generateNextBinaryNum($num));
    }
};

$tasks = new BinaryNumTask;
$tasks->nextBinaryNum();   
