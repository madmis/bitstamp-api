<?php

namespace madmis\BitstampApi\Model;

use madmis\BitstampApi\Api;

/**
 * Class Transaction
 * @package madmis\BitstampApi\Model
 */
class Transaction
{
    /**
     * Unix timestamp date and time.
     * @var \DateTime
     */
    protected $date;

    /**
     * Transaction ID.
     * @var int
     */
    protected $tid;

    /**
     * BTC price.
     * @var float
     */
    protected $price;

    /**
     * buy OR sell
     * @var
     */
    protected $type;

    /**
     * BTC amount.
     * @var float
     */
    protected $amount;

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate(int $date): void
    {
        $this->date = (new \DateTime())->setTimestamp($date);
    }

    /**
     * Transaction ID.
     * @return int
     */
    public function getTid(): int
    {
        return $this->tid;
    }

    /**
     * @param int $tid
     */
    public function setTid(int $tid): void
    {
        $this->tid = $tid;
    }

    /**
     * BTC price.
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
     * buy OR sell
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type ? Api::SELL : Api::BUY;
    }

    /**
     * BTC amount.
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
}
