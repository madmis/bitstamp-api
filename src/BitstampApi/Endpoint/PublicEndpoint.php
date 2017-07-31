<?php

namespace madmis\BitstampApi\Endpoint;

use Doctrine\Common\Collections\ArrayCollection;
use madmis\BitstampApi\Api;
use madmis\BitstampApi\Model\OrderBook;
use madmis\BitstampApi\Model\OrderBookCollection;
use madmis\BitstampApi\Model\Ticker;
use madmis\BitstampApi\Model\Transaction;
use madmis\ExchangeApi\Endpoint\AbstractEndpoint;
use madmis\ExchangeApi\Endpoint\EndpointInterface;
use madmis\ExchangeApi\Exception\ClientException;

/**
 * Class PublicEndpoint
 * @package madmis\BitstampApi\Endpoint
 */
class PublicEndpoint extends AbstractEndpoint implements EndpointInterface
{
    /**
     * @param string $pair
     * @param bool $mapping
     * @return array|Ticker
     * @throws ClientException
     */
    public function ticker(string $pair, bool $mapping = false)
    {
        $response = $this->sendRequest(
            Api::GET,
            $this->getApiUrn(['ticker', $pair])
        );

        if ($mapping && $response) {
            $response = $this->deserializeItem(
                $response,
                Ticker::class
            );

        }

        return $response;
    }

    /**
     * @param string $pair
     * @param bool $mapping
     * @return array|Ticker
     * @throws ClientException
     */
    public function hourlyTicker(string $pair, bool $mapping = false)
    {
        $response = $this->sendRequest(
            Api::GET,
            $this->getApiUrn(['ticker_hour', $pair])
        );

        if ($mapping && $response) {
            $response = $this->deserializeItem(
                $response,
                Ticker::class
            );

        }

        return $response;
    }

    /**
     * Returns a JSON dictionary like the ticker call,
     * with the calculated values being from within an hour.
     * @param string $pair
     * @param bool $mapping
     * @return array|OrderBookCollection
     * @throws ClientException
     */
    public function orderBook(string $pair, bool $mapping = false)
    {
        $response = $this->sendRequest(
            Api::GET,
            $this->getApiUrn(['order_book', $pair])
        );

        if ($mapping && $response) {
            $collection = new OrderBookCollection();
            $collection->setTimestamp($response['timestamp']);
            $collection->setPair($pair);

            $deserializer = function($item) {
                return $this->deserializeItem(array_combine(['price', 'amount'], $item), OrderBook::class);
            };
            $asks = array_map($deserializer, $response['asks']);
            $bids = array_map($deserializer, $response['bids']);

            $collection->setAsks(new ArrayCollection($asks));
            $collection->setBids(new ArrayCollection($bids));

            $response = $collection;
        }

        return $response;
    }


    /**
     * @param string $pair
     * @param string $time The time interval from which we want the transactions to be returned.\
     *                      Possible values are minute, hour (default) or day.
     * @param bool $mapping
     * @return array|Transaction[]
     * @throws ClientException
     */
    public function transactions(string $pair, string $time = 'minute', bool $mapping = false): array
    {
        $options = [
            'query' => ['time' => $time]
        ];
        $response = $this->sendRequest(
            Api::GET,
            $this->getApiUrn(['transactions', $pair]),
            $options
        );

        if ($mapping && $response) {
            $response = $this->deserializeItems(
                $response,
                Transaction::class
            );

        }

        return $response;
    }


    /**
     * @param string $method Http::GET|POST
     * @param string $uri
     * @param array $options Request options to apply to the given
     *                                  request and to the transfer.
     * @return array response
     * @throws ClientException
     */
    protected function sendRequest(string $method, string $uri, array $options = []): array
    {
        $request = $this->client->createRequest($method, $uri);

        return $this->processResponse(
            $this->client->send($request, $options)
        );
    }
}
