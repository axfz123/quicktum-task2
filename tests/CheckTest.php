<?php

namespace Task2\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

use Task2\CodeChecker;

class CheckTest extends TestCase
{
    public static function additionProvider(): array
    {
        return [
            ['{{lajkdhf{adfa}{}adfasdfadf{}}}', true],
            ['{{lajkdhf{adfa', false],
            ['}}asdf{{', false],
            ['{{sdfdfsdf{{fdsf}}}sdf}}}}as234', false],
            ['{{{{sdfdf{sdf{{fdsf}}}sdf}}}}as234', true]
        ];
    }

    #[DataProvider('additionProvider')]
    public function testCheck(string $str, bool $expected): void
    {
        $obj = new CodeChecker($str);
        $result = $obj->isValid();
        $this->assertEquals($expected, $result);
    }
}
