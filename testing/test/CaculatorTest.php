<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use App\Caculator;

class CaculatorTest extends TestCase
{
    public function test_sum_1()
    {
        $objCaculator = new Caculator();
        $output     = $objCaculator->sum(2, 3);
        $expected   = 5;
        $this->assertEquals($output, $expected);
    }
    public function test_sum_2()
    {
        $objCaculator = new Caculator();
        $output     = $objCaculator->sum(5, 5);
        $expected   = 10;
        $this->assertEquals($output, $expected);
    }
    public function test_minus()
    {
        $objCaculator = new Caculator();
        $output     = $objCaculator->minus(5, 2);
        $expected   = 3;
        $this->assertEquals($output, $expected);
    }
}
