<?php

namespace Task2;

class CodeChecker {
    private string $str;

    public function __construct(string $str)
    {
        $this->setStr($str);
    }

    public function isValid(): bool
    {
        $str = $this->getStr();
        $arr = str_split($str);
        $balance = 0;
        foreach($arr as $s) {
            $shift = match($s) {
                '{' => 1,
                '}' => -1,
                default => 0
            };
            $balance += $shift;
            if ($balance < 0) {
                return false;
            }
        }
        return $balance === 0;
    }

    public function setStr(string $str): void
    {
        if (empty($str)) {
            throw new \InvalidArgumentException("Строка не может быть пустой");
        }
        $this->str = $str;
    }

    public function getStr(): string
    {
        return $this->str;
    }
}
