<?php

namespace NP\Endpoint;

use NP\Client;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;

/**
 * Abstract Endpoint.
 * 
 * @author Nikolai Shcherbin <support@wzm.me>
 * @copyright Nikolai Shcherbin
 */
abstract class AbstractEndpoint implements EndpointInterface
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
	const METHOD_PATCH = 'PATCH';
	const METHOD_DELETE = 'DELETE';
    
    /**
     * @var Client
     */
    protected $client;
    
    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    
    /**
     * @param string $endpoint = null
     * 
     * @return string
     */
    private function getUrl(string $endpoint = null): string
    {
        return implode('/', [
            $this->client->getApiEndpoint(),
            $this->client::API_VERSION,
            $this->getResource(),
            $endpoint
        ]);
    }
    
    /**
     * @param string $method = 'GET'
     * @param string $endpoint = null
     * @param array $data = []
     * @param array $query = []
     * 
     * @return array
     */
    protected function request(string $method = self::METHOD_GET, string $endpoint = null, array $data = [], array $query = []): array
    {
        if (!is_null($this->client->getJwt())) {
			$options = [
				RequestOptions::HEADERS => [
					'x-api-key' => $this->client->getApiKey(),
					'Authorization' => 'Bearer ' . $this->client->getJwt(),
				],
				RequestOptions::QUERY => $query
			];
		} else {
			$options = [
				RequestOptions::HEADERS => [
					'x-api-key' => $this->client->getApiKey()
				],
				RequestOptions::QUERY => $query
			];
		}
        
        if ($method == self::METHOD_POST || $method == self::METHOD_PATCH) {
            $options[RequestOptions::JSON] = $data;
        }
        
        try {
            $guzzleClient = new GuzzleClient();
            $response  = $guzzleClient->request($method, $this->getUrl($endpoint), $options);
            
            return json_decode($response->getBody()->getContents(), true);
            
        } catch (RequestException $requestException) {
            if ($requestException->hasResponse()) {
                return json_decode($requestException->getResponse()->getBody()->getContents(), true);
            }
            
            return [
                'message' => 'no response'
            ];
        }
    }
}