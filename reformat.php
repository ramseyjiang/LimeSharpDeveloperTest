<?php
Class ReformatTask
{
    public $vowels = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];

    public function reformat(string $formatStr){
        if(empty($formatStr)) {
            echo 'The string is empty.';
        } else {
            echo ucfirst(strtolower(str_replace($this->vowels, "", $formatStr)));
        }
    }
};
