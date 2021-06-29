<?php

namespace Onetoweb\NOWPayments\Endpoint;

use Onetoweb\NOWPayments\Client;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;

/**
 * Abstract Endpoint.
 * 
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 */
abstract class AbstractEndpoint implements EndpointInterface
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    
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
            $this->client::API_ENDPOINT,
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
        $options = [
            RequestOptions::HEADERS => [
                'x-api-key' => $this->client->getApiKey()
            ],
            RequestOptions::QUERY => $query
        ];
        
        if ($method == self::METHOD_POST) {
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