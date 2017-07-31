<?php

namespace madmis\BitstampApi\Model;

/**
 * Class OrderBook
 * @package madmis\BitstampApi\Model
 */
class OrderBook
{
    /**
     * @var float
     */
    protected $price;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * price * amount
     * @return float
     */
    public function getTotal(): float
    {
        return (float)bcmul($this->price, $this->getAmount(), 10);
    }
}
