<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\CoinChanger;
use App\Exceptions\PriceBiggerThanInputException;

class CoinChangerTest extends TestCase
{
    public function testChange()
    {
        $coin_changer = new CoinChanger();
        $result = $coin_changer->change(16, 15);
        $this->assertEquals([1 => 1, 5 => 0, 10 => 0], $result);

        $result = $coin_changer->change(10, 10);
        $this->assertEquals([1 => 0, 5 => 0, 10 => 0], $result);

        $result = $coin_changer->change(20, 15);
        $this->assertEquals([1 => 0, 5 => 1,  10 => 0], $result);

        $result = $coin_changer->change(30, 21);
        $this->assertEquals([1 => 4, 5 => 1,  10 => 0], $result);

        $result = $coin_changer->change(30, 0);
        $this->assertEquals([1 => 0, 5 => 0,  10 => 3], $result);

        $result = $coin_changer->change(5, 0);
        $this->assertEquals([1 => 0, 5 => 1,  10 => 0], $result);

        $result = $coin_changer->change(4, 0);
        $this->assertEquals([1 => 4, 5 => 0,  10 => 0], $result);

        $this->expectException(PriceBiggerThanInputException::class);
        $result = $coin_changer->change(10, 20);
        
    }
}
