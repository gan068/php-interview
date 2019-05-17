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
        if ($price > $input) {
            throw new PriceBiggerThanInputException();
        }
        $result = [
            1 => 0,
            5 => 0,
            10 => 0,
        ];
        $output = $input - $price;

        $result[10] = intval(floor($output / 10));
        $output -= $result[10] * 10;

        $result[5] = intval(floor($output / 5));
        $output -= $result[5] * 5;

        $result[1] = $output;

        return $result;
    }
}
