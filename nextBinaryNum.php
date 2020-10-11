<?php
Class BinaryNumTask
{
    public function nextBinaryNum(string $initStr){
        if($initStr!=0 && empty($initStr)) {
            echo 'Your input string is empty.';
        } else {
            $binaryArray = explode(',', $initStr);

            if(!ctype_digit(implode('', $binaryArray))) {//It is used to check all elements are number or not. I know it is not only 0 and 1, but I think here is not the point for this task.
                echo 'Your input includes something, not a binary number.';
            } else {
                $this->outputBinaryNum($binaryArray);
            }
        }
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
            if($num[$i] == 0 && $i == (count($num) - 1)){//For all binary which the last number is 0. It also includes only input 0
                $num[$i] = 1;
            } elseif($num[$i] == 1 && count($num) == 1) {//For only input 1
                $num[$i] = 1;
                $num[$i+1] = 0;
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
