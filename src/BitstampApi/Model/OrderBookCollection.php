<?php

namespace madmis\BitstampApi\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class OrderBookCollection
 * @package madmis\BitstampApi\Model
 */
class OrderBookCollection
{
    /**
     * Server timestamp
     * @var \DateTime
     */
    private $timestamp;

    /**
     * @var string
     */
    private $pair;

    /**
     * @var ArrayCollection
     */
    private $asks;

    /**
     * @var ArrayCollection
     */
    private $bids;

    public function __construct()
    {
        $this->asks = new ArrayCollection();
        $this->bids = new ArrayCollection();
    }

    /**
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
     * @return ArrayCollection
     */
    public function getAsks(): ArrayCollection
    {
        return $this->asks;
    }

    /**
     * @param ArrayCollection $asks
     */
    public function setAsks(ArrayCollection $asks): void
    {
        $this->asks = $asks;
    }

    /**
     * @param OrderBook $order
     */
    public function addAsk(OrderBook $order): void
    {
        if (!$this->asks->contains($order)) {
            $this->asks->add($order);
        }
    }

    /**
     * @param OrderBook $order
     */
    public function removeAsk(OrderBook $order): void
    {
        if ($this->asks->contains($order)) {
            $this->asks->removeElement($order);
        }
    }

    /**
     * @return ArrayCollection
     */
    public function getBids(): ArrayCollection
    {
        return $this->bids;
    }

    /**
     * @param ArrayCollection $bids
     */
    public function setBids(ArrayCollection $bids): void
    {
        $this->bids = $bids;
    }


    /**
     * @param OrderBook $order
     */
    public function addBid(OrderBook $order): void
    {
        if (!$this->bids->contains($order)) {
            $this->bids->add($order);
        }
    }

    /**
     * @param OrderBook $order
     */
    public function removeBid(OrderBook $order): void
    {
        if ($this->bids->contains($order)) {
            $this->bids->removeElement($order);
        }
    }

    /**
     * @return string
     */
    public function getPair(): string
    {
        return $this->pair;
    }

    /**
     * @param string $pair
     */
    public function setPair(string $pair): void
    {
        $this->pair = $pair;
    }
}
