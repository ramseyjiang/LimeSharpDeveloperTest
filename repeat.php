<?php
Class RepeatTask
{
    private $repeatNum = 2;
    private $repeatArray = [];

    /**
     * For the first test repeat array.
     *
     * @param array $initArray
     * @return void
     */
    public function repeat(string $initStr='') {
        if(empty($initStr)) {
            echo 'Your input string is empty.';
        } else {
            $initArray = explode(',', $initStr);
            $this->generateRepeatArray($initArray);
            print_r($this->repeatArray);
        }
    }

    /**
     * Generate the repeat array
     *
     * @param array $initArray
     * @return void
     */
    private function generateRepeatArray(array $initArray = []) {
        for($i = $this->repeatNum; $i>=0; $i--) {
            foreach($initArray as $v) {
                $this->repeatArray[] = $v;
            }
        }
    }
};
