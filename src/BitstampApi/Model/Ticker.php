<?php

namespace madmis\BitstampApi\Model;

/**
 * Class Ticker
 * @package madmis\BitstampApi\Model
 */
class Ticker
{
    /**
     * Last BTC price.
     * @var float
     */
    protected $last;

    /**
     * Last 24 hours price high.
     * @var float
     */
    protected $high;

    /**
     * Last 24 hours price low.
     * @var float
     */
    protected $low;

    /**
     * Last 24 hours volume weighted average price.
     * @var float
     */
    protected $vwap;

    /**
     * Last 24 hours volume.
     * @var float
     */
    protected $volume;

    /**
     * Highest buy order.
     * @var float
     */
    protected $bid;

    /**
     * Lowest sell order.
     * @var float
     */
    protected $ask;

    /**
     * Unix timestamp date and time.
     * @var \DateTime
     */
    protected $timestamp;

    /**
     * First price of the day.
     * @var float
     */
    protected $open;

    /**
     * Last BTC price.
     * @return float
     */
    public function getLast(): float
    {
        return $this->last;
    }

    /**
     * @param float $last
     */
    public function setLast(float $last): void
    {
        $this->last = $last;
    }

    /**
     * Last 24 hours price high.
     * @return float
     */
    public function getHigh(): float
    {
        return $this->high;
    }

    /**
     * @param float $high
     */
    public function setHigh(float $high): void
    {
        $this->high = $high;
    }

    /**
     * Last 24 hours price low.
     * @return float
     */
    public function getLow(): float
    {
        return $this->low;
    }

    /**
     * @param float $low
     */
    public function setLow(float $low): void
    {
        $this->low = $low;
    }

    /**
     * Last 24 hours volume weighted average price.
     * @return float
     */
    public function getVwap(): float
    {
        return $this->vwap;
    }

    /**
     * @param float $vwap
     */
    public function setVwap(float $vwap): void
    {
        $this->vwap = $vwap;
    }

    /**
     * Last 24 hours volume.
     * @return float
     */
    public function getVolume(): float
    {
        return $this->volume;
    }

    /**
     * @param float $volume
     */
    public function setVolume(float $volume): void
    {
        $this->volume = $volume;
    }

    /**
     * Highest buy order.
     * @return float
     */
    public function getBid(): float
    {
        return $this->bid;
    }

    /**
     * @param float $bid
     */
    public function setBid(float $bid): void
    {
        $this->bid = $bid;
    }

    /**
     * Lowest sell order.
     * @return float
     */
    public function getAsk(): float
    {
        return $this->ask;
    }

    /**
     * @param float $ask
     */
    public function setAsk(float $ask): void
    {
        $this->ask = $ask;
    }

    /**
     * Unix timestamp date and time.
     * @return \DateTime
     */
    public function getTimestamp(): \DateTime
    {
        return $this->timestamp;
    }

    /**
     * @param int $timestamp
     */
    public function setTimestamp(int $timestamp): void
    {
        $this->timestamp = (new \DateTime())->setTimestamp($timestamp);
    }

    /**
     * First price of the day.
     * @return float
     */
    public function getOpen(): float
    {
        return $this->open;
    }

    /**
     * @param float $open
     */
    public function setOpen(float $open): void
    {
        $this->open = $open;
    }
}
