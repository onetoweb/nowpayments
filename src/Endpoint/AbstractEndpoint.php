<?php

namespace Onetoweb\NOWPayments\Endpoint;

use Onetoweb\NOWPayments\Client;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

/**
 * Abstract Endpoint.
 *
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 */
abstract class AbstractEndpoint implements EndpointInterface
{

    protected ?string $endpoint = null;

    protected array $options = [], $query = [], $data = [];

    public function __construct(
        protected Client       $client,
        protected GuzzleClient $http = new GuzzleClient()
    )
    {
    }

    /**
     * @param array $query
     * @return AbstractEndpoint
     */
    public function setQuery(array $query): AbstractEndpoint
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param string|null $endpoint
     * @return AbstractEndpoint
     */
    public function setEndpoint(?string $endpoint): AbstractEndpoint
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * @param array $data
     * @return AbstractEndpoint
     */
    public function setData(array $data): AbstractEndpoint
    {
        $this->data = $data;
        return $this;
    }

    private function getUrl(): string
    {
        return implode('/', [
            $this->client->getApiEndpoint(),
            $this->client::API_VERSION,
            $this->getResource(),
            $this->endpoint
        ]);
    }

    /**
     * @param callable $response
     * @return array
     */
    protected function request(callable $response): array
    {
        $this->prepareOptions();
        return json_decode($response()->getBody()->getContents(), true);

    }

    protected function prepareOptions()
    {
        $this->options += [
            RequestOptions::HEADERS => [
                'x-api-key' => $this->client->getApiKey()
            ],
            RequestOptions::QUERY => $this->query
        ];


    }

    protected function post(): array
    {
        $this->options[RequestOptions::JSON] = $this->data;
        return $this->request(fn(): ResponseInterface => $this->http->post($this->getUrl(), $this->options));
    }


    protected function get(): array
    {
        return $this->request(fn(): ResponseInterface => $this->http->get($this->getUrl(), $this->options));
    }

}