<?php


class Password
{
    public int $pass_len; //length of password
    public array $arr; // details of password

    function __construct($pass_len = 16, $arr = ['number', 'lowercase', 'uppercase', 'symbol'])
    {
        $this->pass_len = $pass_len;
        $this->arr = $arr;
    }

    public function generate(): string
    {
        $result = '';
        $all_letters = '';
        $lower = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $symbols = '!@#$%^&*()';
        if (in_array('number', $this->arr)) {
            $all_letters .= $numbers;
        }
        if (in_array('lowercase', $this->arr)) {
            $all_letters .= $lower;
        }
        if (in_array('uppercase', $this->arr)) {
            $all_letters .= strtoupper($lower);
        }
        if (in_array('symbol', $this->arr)) {
            $all_letters .= $symbols;
        }

        for ($i = 0; $i < $this->pass_len; $i++) {
            $random_index = rand(0, strlen($all_letters) - 1);
            $random_letter = $all_letters[$random_index];
            $result .= $random_letter;
        }
        return $result;
    }
}

// example
$obj = new Password(20, ['number', 'lowercase', 'uppercase', 'symbol']);
echo $obj->generate();

?>
