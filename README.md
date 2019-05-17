# PHP 工程師面試
* 作答時間：30分鐘
* 請完成 PHP 與 資料庫 的題目
* 基礎與資訊安全未作答完成的可在面試時進行回答

## PHP
1. 請寫出以下程式執行結果
```php
<?php
$x = "1";
if ($x === 1) {
  echo "Hello ";
}

$y = 0;
if (!empty($y)) {
  echo "My ";
}
echo "World";
```

2. 請撰寫符合測試程式的販賣機找零類別

```php
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


```

```php
<?php
namespace App;

use App\Exceptions\PriceBiggerThanInputException;

class CoinChanger
{

    /**
     * 販賣機找零程式
     * 只接受 1 元與 5元 與 10 元硬幣投入
     * 只會找零 1 元與 5元 與 10 元硬幣
     *
     * @param integer $input 投入金額
     * @param integer $price 所選取的商品售價
     * @return array 找零金額
     * @throws App\Exceptions\PriceBiggerThanInputException
     */

    public function change(int $input, int $price)
    {
        $result = [
            1 => 0,
            5 => 0,
            10 => 0,
        ];
        return $result;
    }
}

```
```php
<?php

namespace App\Exceptions;

use Exception;

class PriceBiggerThanInputException extends Exception
{

}

```

## 資料庫
1. 請寫出 T-SQL 查詢
目的：不同年級中，分數最高的前三名學生

| Grade | Name    | Score |
| ----- | ------- | ----- |
| 3     | Michael | 80    |
| 3     | Mary    | 86    |
| 2     | Owen    | 72    |
| 3     | Josh    | 90    |
| 2     | Dylan   | 93    |
| 3     | Bill    | 76    |
| 3     | Eric    | 82    |
| 2     | Ruby    | 77    |
| 2     | Vivian  | 89    |




## 基礎
1. 請解釋軟體開發的 S.O.L.I.D 原則
2. 說出或畫出你之前專案的伺服器架構
3. 使用過哪些快取技術，分別的使用情境是什麼？
4. 使用過佇列嗎？ 使用的情境是什麼？
5. 請解釋 Session 與 Cookie 的區別

## 資訊安全
1. 請說明你使用哪些方法防 SQL Injection
2. 請說明你使用哪些方法防止 XSS攻擊
